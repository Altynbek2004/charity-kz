<?php

namespace App\Http\Controllers;

use App\Models\GetHelp;
use Illuminate\Http\Request;

class getHelpController extends Controller
{
    public function getHelp(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'number' => 'required|string',
            'email' => 'required|email',
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:2048',
            'info' => 'required|string',
        ]);

        $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
        $imagePath = $request->file('file')->storeAs('GetHelp', $fileName, 'public');
        $validated['file'] = 'storage/' . $imagePath;

        $help = GetHelp::create($validated);

        return response()->json($help);
    }

    public function getOneHelp(){
        $helps= GetHelp::all();
        return response()->json($helps);
    }

}
