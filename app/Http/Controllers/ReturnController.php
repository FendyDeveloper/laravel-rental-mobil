<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Payment;
use App\Models\ReturnCar;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $returns = ReturnCar::with(['payment', 'transaction'])->get();
        return view('dashboard.returns.index', compact('returns'));
    }

    /**
     * Show the form for creating a new resource.
     */
        public function create()
        {
            
            $returns = ReturnCar::with(['payment', 'transaction'])->get();
            // $payment = Payment::with('id_payment')->get();
            // $transactions = Transaction::all();
            // dd($returns);
            // dd($returns);
            return view('dashboard.returns.test', compact('returns'));
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ReturnCar $returnCar)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'id_transaction' => 'required|exists:transactions,id_transaction',
            'new_return_date' => 'required|date',
            'car_condition' => 'nullable|string',
            'fine' => 'nullable|numeric|min:0',
            'license_plate' => 'required',
            'days_difference' => 'required',
        ]);

        // dd($validatedData);

        // Create the return record
        $return = ReturnCar::create([
            'id_transaction' => $validatedData['id_transaction'],
            'return_date' => $validatedData['new_return_date'],
            'car_condition' => $validatedData['car_condition'],
            'fine' => $validatedData['fine'] ?? 0,
        ]);
        // dd($return);

       
        
        $harga_car = Car::where('license_plate', $request->license_plate)->first();
        $denda_car = $harga_car->price + $harga_car->price * 0.20;
        // dd($request->days_difference);
        $total_denda = $denda_car * $request->days_difference;

        $transaction = Transaction::where('id_transaction', $request->id_transaction)->firstOrFail();
        $transaction->status = 'returned';
        $transaction->balance_due = $transaction->balance_due + $validatedData['fine'] + $total_denda;
        // dd($transaction->balance_due);
        $transaction->save();

        // $payment = Payment::create([
        //     // 'id_return' => $validatedData['id_transaction'],
        //     'total_payment' => $transaction->balance_due,
        //     'status' => 'unpaid',
        // ]);

        // dd($payment);

        $car = Car::where('license_plate', $transaction->license_plate)->firstOrFail();
        $car->status = 'available';
        $car->save();

        // $payment = Payment::

        return redirect()->route('transactions.index')->with('success', 'Return record created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(ReturnCar $returnCar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReturnCar $returnCar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReturnCar $returnCar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReturnCar $returnCar)
    {
        //
    }
}
