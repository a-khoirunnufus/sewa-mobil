@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('car-rentals.create') }}" class="btn btn-primary mb-3 fw-bold">
                Sewa Mobil
            </a>
            <div class="card">
                <div class="card-header">Daftar Penyewaan Mobil Saya</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Mobil</th>
                                <th>Tarif Sewa Per Hari</th>
                                <th>Tanggal Mulai Sewa</th>
                                <th>Tanggal Akhir Sewa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($car_rentals->count() == 0)
                                <tr>
                                    <td colspan="4" class="text-center">Data Kosong</td>
                                </tr>
                            @endif
                            @foreach ($car_rentals as $rental)
                                <tr>
                                    <td>
                                        {{ $rental->car->brand }}<br>
                                        {{ $rental->car->model }}<br>
                                        {{ $rental->car->plate_number }}
                                    </td>
                                    <td>{{ $rental->car->rental_fee }}</td>
                                    <td>{{ $rental->from_time }}</td>
                                    <td>{{ $rental->end_time }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
