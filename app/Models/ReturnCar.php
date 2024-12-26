<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReturnCar extends Model
{
    use HasFactory;

    // Specify the table name if it's different from the default
   
    protected $table = 'returns'; // Optional, if your table name matches the model name
    protected $primaryKey = 'id_return'; // Specify the primary key
    public $incrementing = true; // Ensure this is set if you're using an auto-incrementing primary key
    protected $keyType = 'int'; // Specify the key type

    // Fillable properties for mass assignment
    protected $fillable = [
        'id_transaction', // Add the id_transaction field
        'return_date',
        'car_condition',
        'fine',
    ];

    // You can also define relationships if needed
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'id_transaction', 'id_transaction');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id_return', 'id_return');
    }
  

    

}
