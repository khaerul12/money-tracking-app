<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    
    public function index()
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Fetch transactions for the logged-in user
            $transactions = auth()->user()->transactions; 
    
            // Calculate total income and total expenses
            $totalIncome = $transactions->where('type', 'income')->sum('amount');
            $totalExpense = $transactions->where('type', 'expense')->sum('amount');
    
            // Calculate balance as income - expense
            $balance = $totalIncome - $totalExpense;
        } else {
            // If not authenticated, set transactions and balance to empty or zero
            $transactions = collect(); // Empty collection
            $balance = 0;
        }
    
        // Return the view from the transactions subdirectory
        return view('transactions.index', compact('transactions', 'balance'));
    }
    public function create()
    {
        // This method can be used to show a form for creating a new transaction
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
        ]);
    
        // Create a new transaction and associate it with the authenticated user
        $transaction = new Transaction($request->all());
        $transaction->user_id = auth()->id(); // Set the user_id to the authenticated user's ID
        $transaction->save(); // Save the transaction
    
        return redirect()->route('transactions.index')->with('success', 'Transaction added successfully!');
    }

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully!');
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully!');
    }
}