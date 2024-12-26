<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars'; // Name of the table
    protected $primaryKey = 'id_car'; // Primary key column name
    public $incrementing = true; // Indicates whether the primary key is auto-incrementing
    protected $keyType = 'int'; // Data type of the primary key (integer)

    protected $fillable = [
        'license_plate',
        'brand',
        'type',
        'year',
        'price',
        'image',
        'status',
    ];

    public function car()
{
    return $this->belongsTo(Car::class, 'license_plate', 'license_plate'); // Correct foreign key relationship
}
}
