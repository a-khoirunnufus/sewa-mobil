<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarRental;

class CarRentalController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $is_admin = true;

        $query = CarRental::with(['car', 'user']);

        if (!$is_admin) {
            $query->where('user_id', $user->id);
        }

        $car_rentals = $query->get();

        return view('car-rental.index', ['car_rentals' => $car_rentals]);
    }

    public function create()
    {
        return view('car-rental.create');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'car_id' => ['required', 'exists:App\Models\Car'],
            'user_id' => ['required', 'exists:App\Models\User'],
            'from_time' => ['required'],
            'end_time' => ['required'],
        ]);
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());
        $validator->validate();
        $validated = $validator->validated();

        try {
            // validasi ketersediaan
            CarRental::where('car_id', '=', $validated['car_id'])
                ->where('from_time', '<=', $validated['from_time'])
                ->where('end_time', '>=', $validated['end_time']);

            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
