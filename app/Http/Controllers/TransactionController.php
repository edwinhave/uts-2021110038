<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $transaction = Transaction::paginate(10);
        return view('transactions.index', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'amount' => 'required|numeric|min:3|max:9999999',
            'type' => 'required|in:Income,Expense',
            'category' => 'required|string',
            'notes' => 'required|string',
        ]);

        $transaction = Transaction::create([[
            'amount' => $validate['amount'],
            'type' => $validate['type'],
            'category' => $validate['category'],
            'notes' => $validate['notes'],
        ]]);
        return redirect()->route('transactions.index')->with('success', 'Transaction added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'body' => 'required|string',
        ]);

        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imagePath = $request->file('image')->store('public/images');

            if ($transaction->image) {
                Storage::delete($transaction->image);
            }

            $validated['image'] = $imagePath;
        }

        $transaction->update([
            'amount' => $validated['amount'],
            'type' => $validated['type'],
            'published_at' => $request->has('is_published') ? Carbon::now() : null,
            // 'image' => $validated['image'] ?? $transaction->image,
        ]);
        return redirect()->route('transcations.index')->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction is deleted successfully.');
    }
}
