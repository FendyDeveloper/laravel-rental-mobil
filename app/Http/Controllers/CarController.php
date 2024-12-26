<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('dashboard.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('dashboard.cars.form', [
            'page_meta' => [
                'title' => 'Create Car',
                'method' => '',
                'url' => route('cars.store'),
            ]
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'license_plate' => 'required|string|max:10|unique:cars',
            'brand' => 'required|string|max:50',
            'type' => 'required|string|max:50',
            'year' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
            'status' => 'required|in:available,unavailable',
        ]);

        // Menangani upload gambar jika ada
        $imagePath = $request->file('image') ? $request->file('image')->store('cars', 'public') : null;

        // Membuat entri baru di database
        Car::create(array_merge($request->except('image'), ['image' => $imagePath]));

        return redirect()->route('cars.index')->with('success', 'Car created successfully.');
    }

    public function show(Car $car)
    {
        return view('dashboard.cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        return view('dashboard.cars.form', [
            'car' => $car,
            'page_meta' => [
                'title' => 'Edit Car',
                'method' => 'PUT',
                'url' =>  route('cars.update', $car->id_car),
            ]
        ]);
    }

    public function update(Request $request, Car $car)
    {
        // $car = Car::find($car->id_car);
        // dd($car);

        $request->validate([
            // 'license_plate' => 'required|string|max:10|unique:cars,license_plate,' . $car->id_car,
            'brand' => 'required|string|max:50',
            'type' => 'required|string|max:50',
            'year' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
            'status' => 'required|in:available,unavailable',
        ]);
        
        $data = $request->all();
        // dd($data);

        if ($request->hasFile('image')) {
            if ($car->image) {
                Storage::disk('public')->delete($car->image);
            }
            $data['image'] = $request->file('image')->store('cars', 'public');
        }

        $car->update($data);

        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');

        
    }

    public function destroy(Car $car)
    {
        // Hapus gambar dari storage jika ada
        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }

        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }
}
