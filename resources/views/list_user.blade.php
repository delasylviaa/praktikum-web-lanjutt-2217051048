@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f48fb1; 
        display: flex;
        justify-content: center;
        align-items: flex-start; /* Konten dimulai dari atas */
        min-height: 100vh;
        margin: 0;
        padding-top: 20px; /* Jarak dari atas */
    }

    .container {
        max-width: 800px;
        width: 100%;
        display: block;
        margin-bottom: 20px; /* Jarak antar elemen */
    }

    .card {
        border: none;
        border-radius: 15px;
        background-color: #fff;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        text-align: center;
    }

    .btn-blue {
        background-color: #90caf9; 
        color: white;
        border: none;
        border-radius: 8px;
        padding: 8px 16px;
        transition: all 0.3s;
    }

    .btn-blue:hover {
        background-color: #64b5f6; 
        color: white;
    }

    .btn-blue-outline {
        color: #90caf9;
        border: 1px solid #90caf9;
        background-color: transparent;
        transition: all 0.3s;
    }

    .btn-blue-outline:hover {
        background-color: #e3f2fd;
    }

    .table-container {
        background-color: #e3f2fd;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px; /* Jarak dari tombol */
        overflow: hidden;
    }

    .table {
        margin-bottom: 0;
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        width: 100%;
    }

    .table thead th {
        border-bottom: 2px solid #64b5f6;
        color: #42a5f5;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 14px;
        padding: 12px;
        text-align: center;
    }

    .table tbody td {
        padding: 12px;
        vertical-align: middle;
        color: #666;
        text-align: center;
    }

    .table tbody tr:hover {
        background-color: #e3f2fd;
    }

    /* Style untuk tombol tambah pengguna baru */
    .btn-new-user {
        background-color: #42a5f5; /* Warna biru muda */
        color: white;
        border-radius: 8px;
        padding: 10px 20px;
        font-size: 16px;
        transition: all 0.3s;
        margin-bottom: 10px; /* Jarak dari tabel */
    }

    .btn-new-user:hover {
        background-color: #64b5f6; /* Warna saat di-hover */
    }
</style>

<div class="container">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="text-center mb-4" style="color: #90caf9;">Daftar Mahasiswa</h1>
            
            <!-- Tombol tambah pengguna baru di luar table container -->
            <a href="{{ route('user.create') }}" class="btn btn-new-user">Tambah Pengguna Baru</a>

            <!-- Container biru yang berisi tabel -->
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>NPM</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->nama_kelas }}</td>    
                                <td>{{ $user->npm }}</td>
                                <td>
                                    <img src="{{ asset('storage/upload/'.$user->foto) }}" alt="foto user" width="100">
                                </td>
                                <td>
                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-warning mb-3">Detail</a>
                                    <button class="btn btn-sm btn-blue-outline">Edit</button>
                                    <button class="btn btn-sm btn-blue-outline">Hapus</button>
                                </td>
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