<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function index()
    {
        // Get the current user
        $user = auth()->user();

        // Order the accounts created
        $accounts = $user->accounts()->latest()->get();

        return view('accounts.index', compact('accounts'));
    }

    public function create(Request $request)
    {
        // Validate input_text form field and set a max length
        $request->validate([
            'input_text' => 'required|max:50',
        ]);

        // Get the value of the input_text field
        $title = $request->input('input_text');

        // Create Account with the input title field
        $account = new Account();

        $account->title = $title;
        $account->user_id = auth()->id();

        $account->save();

        return redirect()->route('accounts.index')->with('success', 'Account created successfully!');
    }

    public function destroy(Account $account)
    {
        $account->delete();

        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully!');
    }
}
