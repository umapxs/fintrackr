<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index() {
        return view('transactions.index');
    }

    public function create() {
    }
}
