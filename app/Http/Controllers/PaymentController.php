<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\ReturnCar;
use App\Models\Transaction;
use Illuminate\Http\Request;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $payments = Payment::with(['return', 'transaction'])->get();
        $returns = ReturnCar::with('transaction')->get();
        $transactions = Transaction::all();
        // dd($returns);
        return view('dashboard.payments.index', compact('payments', 'transactions', 'returns'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $payment)
    {
        // dd($payment);
        // dd($payment);
        // $return = ReturnCar::where('id_return', $payment)->first();
        // $transaction = Transaction::where('id_transaction', $payment)->first();
        // $payments = Payment::with(['return', 'transaction'])
        // $returns = ReturnCar::with('transaction')->get();
        // ->where('id_transaction', $payment)
        // ->get();
        $transaction = Transaction::where('id_transaction', $payment)->first();
        $return = ReturnCar::where('id_transaction', $payment)->first();
        // $returns = ReturnCar::with(['transaction', 'return'])->where('id_transaction', $payment)->get();
        // dd($return);
        // dd($transaction);
        // if (!$transaction) {
        //     return redirect()->back()->withErrors(['transaction' => 'Transaction not found.']);
        // }
        return view('dashboard.payments.create', compact('return', 'transaction'));

        // return view('dashboard.payments.create');
    }

    // Menyimpan data pembayaran ke dalam databa
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'id_return' => 'required|exists:returns,id_return',
            'payment_date' => 'required|date',
            'total_payment' => 'required|numeric|min:0',
            'status' => 'required|string|in:paid,unpaid',
        ]);

        // Retrieve return data
        $return = ReturnCar::find($request->id_return);

        // Retrieve transaction data (make sure this relates correctly)
        $transaction = Transaction::where('id_transaction', $return->id_transaction)->first();

        if (!$transaction) {
            return redirect()->back()->withErrors(['transaction' => 'Transaction not found.']);
        }

        // Calculate total payment including downpayment
        $totalPayment = $request->total_payment + $transaction->downpayment;
        // dd($totalPayment);
        // Save payment data to the database
        $payment = new Payment();
        $payment->id_return = $request->id_return;
        $payment->total_payment = $totalPayment;
        $payment->status = $request->status;
        $payment->payment_date = $request->payment_date;
        $payment->save();

        // Update balance due in Transaction (if applicable)
        $transaction->balance_due = max(0, $transaction->balance_due - $totalPayment); // Adjust as needed
        $transaction->save();

        return redirect()->route('payments.index')->with('success', 'Payment added successfully!');
    }






    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        dd($payment);
        $return = ReturnCar::where('id_return', $payment->id_payment)->get();
        $transaction = Transaction::where('id_transaction', $payment->id_return)->get();
        // dd($return)->toArray();
        // dd($transaction['balance_due']);
        return view('dashboard.payments.create', compact('return', 'transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
