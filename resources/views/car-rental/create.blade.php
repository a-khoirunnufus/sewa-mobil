@extends('layouts.app')

@section('content')
<div class="container">
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    @if(session()->has('failed'))
        <div class="alert alert-danger">
            {{ session()->get('failed') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('car-rentals.index') }}" class="btn btn-link mb-3">
                Kembali ke daftar penyewaan mobil
            </a>
            <div class="card">
                <div class="card-header">Penyewaan Mobil</div>
                <div class="card-body">
                    <form action="{{ route('car-rentals.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="mb-3">
                            <label class="form-label">Merek</label>
                            <select class="form-control-select" name="car_id">
                                @foreach($cars as $car)
                                    <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }}</option>
                                @endforeach
                            </select>
                            @error('car_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Mulai Sewa</label>
                            <input type="date" class="form-control @error('from_time') is-invalid @enderror" name="from_time" value="{{ old('from_time') }}" required />
                            @error('from_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Akhir Sewa</label>
                            <input type="date" class="form-control @error('end_time') is-invalid @enderror" name="end_time" value="{{ old('end_time') }}" required />
                            @error('end_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Sewa Mobil</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
