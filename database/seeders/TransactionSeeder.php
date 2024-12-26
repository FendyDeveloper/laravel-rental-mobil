<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        Transaction::create([
            'nik' => '1234567890123451',
            'license_plate' => 'AB1234CD',
            'booking_date' => now()->addDays(1)->toDateString(),
            'pickup_date' => now()->addDays(3)->toDateString(),
            'return_date' => now()->addDays(6)->toDateString(),
            'driver' => 1,
            'total' => 1000000.00,
            'downpayment' => 200000.00,
            'balance_due' => 800000.00,
            'status' => 'booking',
        ]);

        Transaction::create([
            'nik' => '1234567890123452',
            'license_plate' => 'EF5678GH',
            'booking_date' => now()->addDays(2)->toDateString(),
            'pickup_date' => now()->addDays(4)->toDateString(),
            'return_date' => now()->addDays(7)->toDateString(),
            'driver' => 0,
            'total' => 1500000.00,
            'downpayment' => 300000.00,
            'balance_due' => 1200000.00,
            'status' => 'booking',
        ]);

        Transaction::create([
            'nik' => '1234567890123452',
            'license_plate' => 'IJ9012KL',
            'booking_date' => now()->addDays(3)->toDateString(),
            'pickup_date' => now()->addDays(5)->toDateString(),
            'return_date' => now()->addDays(8)->toDateString(),
            'driver' => 1,
            'total' => 2000000.00,
            'downpayment' => 400000.00,
            'balance_due' => 1600000.00,
            'status' => 'booking',
        ]);

        Transaction::create([
            'nik' => '1234567890123452',
            'license_plate' => 'MN3456OP',
            'booking_date' => now()->addDays(4)->toDateString(),
            'pickup_date' => now()->addDays(6)->toDateString(),
            'return_date' => now()->addDays(9)->toDateString(),
            'driver' => 0,
            'total' => 2500000.00,
            'downpayment' => 500000.00,
            'balance_due' => 2000000.00,
            'status' => 'booking',
        ]);

        Transaction::create([
            'nik' => '1234567890123452',
            'license_plate' => 'QR7890ST',
            'booking_date' => now()->addDays(5)->toDateString(),
            'pickup_date' => now()->addDays(7)->toDateString(),
            'return_date' => now()->addDays(10)->toDateString(),
            'driver' => 1,
            'total' => 3000000.00,
            'downpayment' => 600000.00,
            'balance_due' => 2400000.00,
            'status' => 'booking',
        ]);

        Transaction::create([
            'nik' => '1234567890123451',
            'license_plate' => 'UV1234WX',
            'booking_date' => now()->addDays(6)->toDateString(),
            'pickup_date' => now()->addDays(8)->toDateString(),
            'return_date' => now()->addDays(11)->toDateString(),
            'driver' => 0,
            'total' => 3500000.00,
            'downpayment' => 700000.00,
            'balance_due' => 2800000.00,
            'status' => 'booking',
        ]);

        Transaction::create([
            'nik' => '1234567890123451',
            'license_plate' => 'YZ5678AB',
            'booking_date' => now()->addDays(7)->toDateString(),
            'pickup_date' => now()->addDays(9)->toDateString(),
            'return_date' => now()->addDays(12)->toDateString(),
            'driver' => 1,
            'total' => 4000000.00,
            'downpayment' => 800000.00,
            'balance_due' => 3200000.00,
            'status' => 'booking',
        ]);

        Transaction::create([
            'nik' => '1234567890123452',
            'license_plate' => 'CD9012EF',
            'booking_date' => now()->addDays(8)->toDateString(),
            'pickup_date' => now()->addDays(10)->toDateString(),
            'return_date' => now()->addDays(13)->toDateString(),
            'driver' => 0,
            'total' => 4500000.00,
            'downpayment' => 900000.00,
            'balance_due' => 3600000.00,
            'status' => 'booking',
        ]);

        Transaction::create([
            'nik' => '1234567890123451',
            'license_plate' => 'GH3456IJ',
            'booking_date' => now()->addDays(9)->toDateString(),
            'pickup_date' => now()->addDays(11)->toDateString(),
            'return_date' => now()->addDays(14)->toDateString(),
            'driver' => 1,
            'total' => 5000000.00,
            'downpayment' => 1000000.00,
            'balance_due' => 4000000.00,
            'status' => 'booking',
        ]);

        Transaction::create([
            'nik' => '1234567890123451',
            'license_plate' => 'KL7890MN',
            'booking_date' => now()->addDays(10)->toDateString(),
            'pickup_date' => now()->addDays(12)->toDateString(),
            'return_date' => now()->addDays(15)->toDateString(),
            'driver' => 0,
            'total' => 5500000.00,
            'downpayment' => 1100000.00,
            'balance_due' => 4400000.00,
            'status' => 'booking',
        ]);
    }
}
