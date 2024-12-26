<?php

namespace App\Http\Controllers;


use App\Models\Car;
use App\Models\Transaction;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::
        latest()
        ->paginate(3);
        return view('dashboard.orders.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Car $order)
    {
        // dd($request->all());
        $request->validate([
            'license_plate' => 'required|exists:cars,license_plate',
            'nik' => 'required|string',
            'booking_date' => 'required|date',
            'pickup_date' => 'required|date|after_or_equal:booking_date',
            'return_date' => 'required|date|after_or_equal:pickup_date',
            'driver' => 'required|in:1,0',
            'downpayment' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'balance_due' => 'required|numeric|min:0',
            'status' => 'required|in:booking,approved,picked_up,returned', 
        ]);
        // dd($request->all());
        Transaction::create([
            'license_plate' => $request->license_plate,  // Pastikan ini sesuai dengan input di form
            'nik' => $request->nik,
            'booking_date' => $request->booking_date,
            'pickup_date' => $request->pickup_date,
            'return_date' => $request->return_date,
            'driver' => $request->driver,
            'total' => $request->total,
            'downpayment' => $request->downpayment,
            'balance_due' => $request->balance_due,
            'status' => $request->status,
        ]);
        
        $car = Car::where('license_plate', $request->license_plate)->firstOrFail();
        $car->status = 'unavailable';
        $car->save();

        // dd($transaction);
        return redirect()->route('orders.index')->with('success', 'Booking confirmed successfully!');
    

    }

    /**
     * Display the specified resource.
     */
    public function show($order)
    {
        $car = Car::findOrFail($order); // Retrieves a single car by its ID
        return view('dashboard.orders.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
