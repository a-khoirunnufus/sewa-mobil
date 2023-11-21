<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return view('car.index', ['cars' => $cars]);
    }

    public function create()
    {
        return view('car.create');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'brand' => ['required'],
            'model' => ['required'],
            'plate_number' => ['required', 'unique:cars'],
            'rental_fee' => ['required', 'numeric'],
        ]);
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());
        $validator->validate();
        $validated = $validator->validated();

        try {
            Car::create($validated);
        } catch (\Throwable $th) {
            return redirect()->route('cars.create')->with('failed', 'Gagal menambahkan data mobil');
        }

        return redirect()->route('cars.create')->with('success', 'Berhasil menambahkan data mobil');
    }
}
