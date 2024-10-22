@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f48fb1; 
        display: flex;
        justify-content: center;
        align-items: flex-start; 
        min-height: 100vh;
        margin: 0;
        padding-top: 20px;
    }

    .container {
        max-width: 1000px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        margin-bottom: 20px;
    }

    .card {
        border: none;
        border-radius: 20px;
        background-color: #fff;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center;
        padding: 20px;
    }

    .card img {
        border-radius: 50%;
        width: 100px;
        height: 100px;
        object-fit: cover;
    }

    .card h2 {
        font-size: 20px;
        color: #424242;
        margin-bottom: 10px;
    }

    .card p {
        font-size: 14px;
        color: #666;
    }

    .card-actions {
        margin-top: 10px;
    }

    .btn {
        margin: 5px;
    }

    .btn-blue-outline {
        color: #90caf9;
        border: 1px solid #90caf9;
        background-color: transparent;
        padding: 5px 10px;
        border-radius: 5px;
        transition: all 0.3s;
    }

    .btn-blue-outline:hover {
        background-color: #64b5f6;
        color: white;
    }

    .btn-pink-outline {
        color: #f48fb1;
        border: 1px solid #f48fb1;
        background-color: transparent;
        padding: 5px 10px;
        border-radius: 5px;
        transition: all 0.3s;
    }

    .btn-pink-outline:hover {
        background-color: #f8bbd0;
        color: white;
    }
</style>

<div class="container">
    @foreach($users as $user)
    <div class="card">
        @if($user->foto)
            <img src="{{ asset('storage/upload/'. $user->foto) }}" alt="Foto pengguna">
        @else
            <img src="https://via.placeholder.com/100" alt="Default avatar">
        @endif
        <h2>{{ $user->nama }}</h2>
        <p>{{ $user->npm }}</p>
        <p>{{ $user->jurusan }}</p>
        <p>{{ $user->nama_kelas }}</p>
        <p>{{ $user->semester }}</p> <!-- Menambahkan informasi semester -->
        <div class="card-actions">
            <a href="{{ route('user.show', $user->id) }}" class="btn btn-blue-outline">Detail</a>
            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-blue-outline">Edit</a>
            <form id="deleteForm-{{ $user['id'] }}" action="{{ route('user.destroy', $user['id']) }}" method="POST" style="display: inline-block">
                @csrf
                @method('DELETE')
                <button type="button" onclick="confirmDelete({{ $user['id'] }})" class="btn btn-pink-outline">Hapus</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
