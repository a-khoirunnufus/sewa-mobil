@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3 fw-bold">
                Tambah Mobil
            </a>
            <div class="card">
                <div class="card-header">Daftar Mobil</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Merek</th>
                                <th>Model</th>
                                <th>Nomor Plat</th>
                                <th>Tarif Sewa Per Hari</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cars as $car)
                                <tr>
                                    <td>{{ $car->brand }}</td>
                                    <td>{{ $car->model }}</td>
                                    <td>{{ $car->plate_number }}</td>
                                    <td>{{ $car->rental_fee }}</td>
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
