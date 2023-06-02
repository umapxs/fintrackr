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

    public function edit($id)
    {
        // Find the account based on the provided ID
        $account = Account::findOrFail($id);

        return view('accounts.edit', compact('account'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'account_name' => 'required|max:50',
        ]);

        // Find the account based on the provided ID
        $account = Account::findOrFail($id);

        // Update the account name
        $account->title = $request->input('account_name');
        $account->save();

        return redirect()->route('accounts.show', $account->id)->with('success', 'Account name updated successfully!');
    }

    public function destroy(Account $account)
    {
        $account->delete();

        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully!');
    }

    public function show($id)
    {
        // Find the account based on the provided ID
        $account = Account::find($id);

        if (!$account) {
            // Handle case when account is not found
            abort(404);
        }

        // Get the account title
        $accountTitle = $account->title;

        // Pass the account to the view
        return view('accounts.show', compact('account', 'accountTitle'));
    }
}
