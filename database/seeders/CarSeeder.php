<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run()
    {
        

        Car::create(['license_plate' => 'AB1234CD', 'brand' => 'Toyota', 'type' => 'SUV', 'year' => 2020, 'price' => 300000, 'image' => 'cars/car-1.jpg', 'status' => 'available']);
        Car::create(['license_plate' => 'EF5678GH', 'brand' => 'Honda', 'type' => 'Sedan', 'year' => 2019, 'price' => 250000, 'image' => 'cars/car-2.jpg', 'status' => 'available']);
        Car::create(['license_plate' => 'IJ9012KL', 'brand' => 'Suzuki', 'type' => 'MPV', 'year' => 2021, 'price' => 280000, 'image' => 'cars/car-3.jpg', 'status' => 'available']);
        Car::create(['license_plate' => 'MN3456OP', 'brand' => 'Nissan', 'type' => 'Hatchback', 'year' => 2020, 'price' => 220000, 'image' => 'cars/car-4.jpg', 'status' => 'available']);
        Car::create(['license_plate' => 'QR7890ST', 'brand' => 'Mitsubishi', 'type' => 'SUV', 'year' => 2018, 'price' => 350000, 'image' => 'cars/car-5.png', 'status' => 'available']);
        Car::create(['license_plate' => 'UV1234WX', 'brand' => 'Kia', 'type' => 'Sedan', 'year' => 2019, 'price' => 240000, 'image' => 'cars/car-6.jpg', 'status' => 'available']);
        Car::create(['license_plate' => 'YZ5678AB', 'brand' => 'Ford', 'type' => 'Pickup', 'year' => 2020, 'price' => 400000, 'image' => 'cars/car-7.jpg', 'status' => 'available']);
        Car::create(['license_plate' => 'CD9012EF', 'brand' => 'Chevrolet', 'type' => 'SUV', 'year' => 2019, 'price' => 330000, 'image' => 'cars/car-8.jpg', 'status' => 'available']);
        Car::create(['license_plate' => 'GH3456IJ', 'brand' => 'BMW', 'type' => 'Luxury', 'year' => 2021, 'price' => 800000, 'image' => 'cars/car-9.jpg', 'status' => 'available']);
        Car::create(['license_plate' => 'KL7890MN', 'brand' => 'Mercedes', 'type' => 'Luxury', 'year' => 2022, 'price' => 950000, 'image' => 'cars/car-10.jpg', 'status' => 'available']);
    
    }
}
