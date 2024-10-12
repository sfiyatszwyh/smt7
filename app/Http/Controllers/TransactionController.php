<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Get all transactions
    public function index()
    {
        $transactions = Transaction::with('customer', 'transactionDetail')->get();
        return response()->json($transactions);
    }

    // Create a new transaction
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'nullable|exists:customers,id',
            'total_price' => 'required|numeric',
            'payment' => 'required|numeric',
            'change' => 'required|numeric',
            'transaction_date' => 'required|date',
        ]);

        $transaction = Transaction::create($validated);
        return response()->json(['message' => 'Transaction created', 'transaction' => $transaction]);
    }

    // Get a single transaction
    public function show($id)
    {
        $transaction = Transaction::with('customer', 'transactionDetail')->findOrFail($id);
        return response()->json($transaction);
    }

    // Update a transaction
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'customer_id' => 'nullable|exists:customers,id',
            'total_price' => 'required|numeric',
            'payment' => 'required|numeric',
            'change' => 'required|numeric',
            'transaction_date' => 'required|date',
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->update($validated);
        return response()->json(['message' => 'Transaction updated', 'transaction' => $transaction]);
    }

    // Delete a transaction
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return response()->json(['message' => 'Transaction deleted']);
    }
}