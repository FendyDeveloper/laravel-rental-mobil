<?php

namespace App\Models;

use App\Models\Car;
use App\Models\User;
use App\Models\ReturnCar;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions'; // Table name

    protected $primaryKey = 'id_transaction'; // Specify the primary key

    public $incrementing = false; // Set to true if using auto-incrementing
    protected $keyType = 'string';
    
    protected $fillable = [
        'nik',
        'license_plate',
        'booking_date',
        'pickup_date',
        'return_date',
        'driver',
        'total',
        'downpayment',
        'balance_due',
        'status',
    ];

    // Relationship with User based on 'nik'
    public function user()
    {
        return $this->belongsTo(User::class, 'nik', 'nik');
    }

    // Relationship with Car based on 'license_plate'
    public function car()
    {
        return $this->belongsTo(Car::class, 'license_plate', 'license_plate');
    }

    public function return()
    {
        return $this->belongsTo(ReturnCar::class, 'id_return', 'id_return');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'id_payment', 'id_payment');
    }

    // public function return()
    // {
    //     return $this->hasOne(ReturnCar::class, 'id_transaction'); // Sesuaikan 'transaction_id' dengan nama kolom foreign key yang benar
    // }
}
 