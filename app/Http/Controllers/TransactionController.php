<?php

namespace App\Http\Controllers;


use App\Models\Transaction;
use App\Models\Payment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'petugas') {
            $bookingTransactions = Transaction::where('status', 'booking')->latest()->get();
            $approvedTransactions = Transaction::where('status', 'approved')->get();
            $pickupTransactions = Transaction::where('status', 'picked_up')->get();
            $returnedTransactions = Transaction::where('status', 'returned')
            ->where('balance_due', '>', 0)
            ->get();


           
           
            
        } else {
            $bookingTransactions = Transaction::where('nik', Auth::user()->nik)
                ->where('status', 'booking')
                ->get();
            $approvedTransactions = Transaction::where('nik', Auth::user()->nik)
                ->where('status', 'approved')
                ->get();
            $pickupTransactions = Transaction::where('nik', Auth::user()->nik)
                ->where('status', 'picked_up')
                ->get();
            $returnedTransactions = Transaction::where('nik', Auth::user()->nik)
                ->where('status', 'returned')
                ->get();
        }

        return view('dashboard.transactions.index', compact(
            'bookingTransactions',
            'approvedTransactions',
            'pickupTransactions',
            'returnedTransactions',
        ));
    }


    public function exportPdf()
    {
        $transactions = Transaction::all(); // Ambil semua data transaksi
        $pdf = Pdf::loadView('dashboard.transactions.pdf', compact('transactions'))
        ->setPaper('A4', 'landscape'); // Buat PDF dari view
        return $pdf->download('transactions.pdf'); // Download PDF
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $transactions = Transaction::all();
        dd($transaction);
        return view('dashboard.transactions.show', compact('transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        // Validate the incoming request
        $request->validate([
            'status' => 'required|in:approved,rejected,picked_up,returned,finished',
        ]);

        // Update the status
        $transaction->status = $request->status;
        $transaction->save();

        // Redirect back with a success message
        return redirect()->route('transactions.index')->with('success', 'Transaction status updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
