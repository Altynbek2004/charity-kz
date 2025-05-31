<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'amount',
        'currency',
        'type',
        'project_id',
        'message',
        'status',
        'payment_method',
        'transaction_id',
        'completed_at'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'completed_at' => 'datetime'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeByPeriod($query, $period)
    {
        switch ($period) {
            case 'month':
                return $query->whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year);
            case 'year':
                return $query->whereYear('created_at', now()->year);
            default:
                return $query;
        }
    }

    public function scopeByType($query, $type)
    {
        if ($type !== 'all') {
            return $query->where('type', $type);
        }
        return $query;
    }
}
