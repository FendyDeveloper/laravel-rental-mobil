<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $cars = Car::orderByRaw("CASE WHEN status = 'available' THEN 0 ELSE 1 END")
        ->take(4)
        ->get()
        ;
        return view('public.index', compact('cars'));
    }
    
}
