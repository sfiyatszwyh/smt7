<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionDetail;



class TransactionDetailController extends Controller
{
    // Get all transaction details
    public function index()
    {
        $details = TransactionDetail::with('product', 'transaction')->get();
        return response()->json($details);
    }

    // Create a new transaction detail
    public function store(Request $request)
    {
        $validated = $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'subtotal' => 'required|numeric',
        ]);

        $detail = TransactionDetail::create($validated);
        return response()->json(['message' => 'Transaction detail created', 'detail' => $detail]);
    }

    // Get a single transaction detail
    public function show($id)
    {
        $detail = TransactionDetail::with('product', 'transaction')->findOrFail($id);
        return response()->json($detail);
    }

    // Update a transaction detail
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'subtotal' => 'required|numeric',
        ]);

        $detail = TransactionDetail::findOrFail($id);
        $detail->update($validated);
        return response()->json(['message' => 'Transaction detail updated', 'detail' => $detail]);
    }

    // Delete a transaction detail
    public function destroy($id)
    {
        $detail = TransactionDetail::findOrFail($id);
        $detail->delete();
        return response()->json(['message' => 'Transaction detail deleted']);
    }
}
