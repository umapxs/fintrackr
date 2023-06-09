<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Count the total accounts for the authenticated user
        $totalAccounts = $user->accounts()->count();

        return view('dashboard', ['totalAccounts' => $totalAccounts]);
    }
}
