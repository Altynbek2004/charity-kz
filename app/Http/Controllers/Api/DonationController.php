<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Project;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function index(Request $request)
    {
        $query = Donation::with('project')
            ->byPeriod($request->get('period', 'all'))
            ->byType($request->get('type', 'all'))
            ->orderBy('created_at', 'desc');

        if ($request->has('email')) {
            $query->where('email', $request->email);
        }

        $donations = $query->paginate(20);

        return response()->json([
            'success' => true,
            'data' => $donations
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'amount' => 'required|numeric|min:100',
            'type' => 'in:money,goods,time',
            'project_id' => 'nullable|exists:projects,id',
            'message' => 'nullable|string|max:1000',
            'payment_method' => 'required|string'
        ]);

        try {
            DB::beginTransaction();

            $donation = Donation::create([
                'name' => $request->name,
                'email' => $request->email,
                'amount' => $request->amount,
                'type' => $request->type ?? 'money',
                'project_id' => $request->project_id,
                'message' => $request->message,
                'payment_method' => $request->payment_method,
                'status' => 'pending'
            ]);

            // Payment processing
            if ($request->type === 'money') {
                $paymentResult = $this->paymentService->processPayment([
                    'amount' => $request->amount,
                    'currency' => 'KZT',
                    'method' => $request->payment_method,
                    'donor_email' => $request->email,
                    'donation_id' => $donation->id
                ]);

                if ($paymentResult['success']) {
                    $donation->update([
                        'status' => 'completed',
                        'transaction_id' => $paymentResult['transaction_id'],
                        'completed_at' => now()
                    ]);

                    // Update project amount
                    if ($donation->project_id) {
                        $project = Project::find($donation->project_id);
                        $project->increment('current_amount', $donation->amount);
                    }
                } else {
                    $donation->update(['status' => 'failed']);

                    DB::rollBack();
                    return response()->json([
                        'success' => false,
                        'message' => 'Төлем жүйесінде қате орын алды',
                        'error' => $paymentResult['error']
                    ], 400);
                }
            } else {
                // For non-money donations, mark as completed immediately
                $donation->update([
                    'status' => 'completed',
                    'completed_at' => now()
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Қайырымдылық сәтті өтті! Рахмет!',
                'data' => $donation->load('project')
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Қайырымдылық кезінде қате орын алды',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(Donation $donation)
    {
        return response()->json([
            'success' => true,
            'data' => $donation->load('project')
        ]);
    }

    public function getStats()
    {
        $stats = [
            'total_donations' => Donation::completed()->sum('amount'),
            'total_donors' => Donation::completed()->distinct('email')->count(),
            'total_projects' => Project::count(),
            'active_projects' => Project::active()->count(),
            'monthly_donations' => Donation::completed()
                ->whereMonth('completed_at', now()->month)
                ->sum('amount'),
            'recent_donations' => Donation::completed()
                ->with('project')
                ->latest('completed_at')
                ->take(5)
                ->get()
        ];

        return response()->json([
            'success' => true,
            'data' => $stats
        ]);
    }
}
