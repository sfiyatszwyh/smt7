<?php

namespace App\Http\Controllers;

use App\Models\StockLog;
use Illuminate\Http\Request;

class StockLogController extends Controller
{
    // Get all stock logs
    public function index()
    {
        $logs = StockLog::with('product')->get();
        return response()->json($logs);
    }

    // Create a new stock log
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'change' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $log = StockLog::create($validated);
        return response()->json(['message' => 'Stock log created', 'log' => $log]);
    }

    // Get a single stock log
    public function show($id)
    {
        $log = StockLog::with('product')->findOrFail($id);
        return response()->json($log);
    }

    // Update a stock log
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'change' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $log = StockLog::findOrFail($id);
        $log->update($validated);
        return response()->json(['message' => 'Stock log updated', 'log' => $log]);
    }

    // Delete a stock log
    public function destroy($id)
    {
        $log = StockLog::findOrFail($id);
        $log->delete();
        return response()->json(['message' => 'Stock log deleted']);
    }
}
