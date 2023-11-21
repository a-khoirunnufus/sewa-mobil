@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profil</div>

                <div class="card-body">
                    @php
                        $user = auth()->user();
                    @endphp
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="fw-bold" style="width: 150px">Nama Lengkap</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold" style="width: 150px">Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold" style="width: 150px">Nomor Hp</td>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold" style="width: 150px">Nomor SIM</td>
                                <td>{{ $user->driver_licence }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold" style="width: 150px">Alamat</td>
                                <td>{{ $user->address }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
