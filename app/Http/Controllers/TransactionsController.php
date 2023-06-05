<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;
use App\Models\Account;
use App\Models\Transactions;

class TransactionsController extends Controller
{
    public function index($id) {
        // Retrieve the account data using the provided $id
        $account = Account::findOrFail($id);

        // Retrieve the categories for the current user
        $categories = Categories::where('user_id', Auth::id())->get();

        return view('transactions.index', compact('account', 'categories'));
    }

    public function create(Request $request, $id) {
        $request->validate([
            'category_id' => 'required|string|max:50',
            'transaction_value' => 'required|numeric'
        ]);

        // Create a new Transactions instance
        $transaction = new Transactions();

        $transaction->user_id = Auth::id();
        $transaction->account_id = $id;
        $transaction->category_id = $request->input('category_id');
        $transaction->transaction_value = $request->input('transaction_value');

        $transaction->save();

        return redirect()->route('accounts.show', ['id' => $id])->with('success', 'Transaction added successfully!');
    }
}
