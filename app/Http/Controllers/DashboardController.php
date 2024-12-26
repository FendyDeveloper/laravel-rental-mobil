<?php

namespace App\Http\Controllers;

use App\Models;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = Models\User::all()->count();
        $transactions = Models\Transaction::all()->count();
        $cars = Models\Car::all()->count();
        $totalIncome = Models\Payment::sum('total_payment');

        return view('dashboard.index', compact(
            'users', 
            'transactions', 
            'cars', 
            'totalIncome'
            )
        );
    }
}
