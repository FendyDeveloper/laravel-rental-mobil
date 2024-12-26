<?php

namespace App\Models;


use App\Models\ReturnCar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    

    protected $primaryKey = 'id_payment';
    
    protected $fillable = [
        'return_id',
        'payment_date',
        'total_payment',
        'status',
    ];

    public function return()
    {
        return $this->belongsTo(ReturnCar::class, 'id_return', 'id_return');
    }
    public function transaction()
    {
        return $this->belongsTo(ReturnCar::class, 'id_transaction', 'id_transaction');
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id_return', 'id_return');
    }
}

