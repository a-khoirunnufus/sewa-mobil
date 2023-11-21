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
            <a href="{{ route('cars.index') }}" class="btn btn-link mb-3">
                Kembali ke daftar mobil
            </a>
            <div class="card">
                <div class="card-header">Tambah Mobil</div>
                <div class="card-body">
                    <form action="{{ route('cars.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Merek</label>
                            <input type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ old('brand') }}" required />
                            @error('brand')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Model</label>
                            <input type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') }}" required />
                            @error('model')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor Plat</label>
                            <input type="text" class="form-control @error('plate_number') is-invalid @enderror" name="plate_number" value="{{ old('plate_number') }}" required />
                            @error('plate_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Biaya Sewa Per Hari</label>
                            <input type="number" class="form-control @error('rental_fee') is-invalid @enderror" name="rental_fee" value="{{ old('rental_fee') }}" required />
                            @error('rental_fee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
