<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VisitLog;
use Illuminate\Http\Request;

class VisitLogController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
        ]);

        VisitLog::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'latitude' => $validated['latitude'] ?? null,
            'longitude' => $validated['longitude'] ?? null,
        ]);

        return response()->json(['status' => 'success'], 201);
    }
}