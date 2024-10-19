@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: #f48fb1;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: sans-serif;
        }

        .container {
            background-color: #90caf9;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
        }

        .container h2 {
            color: #2196F3;
            margin-bottom: 20px;
        }

        .form-control {
            border: none;
            border-bottom: 2px solid #2196F3;
            padding: 10px;
            margin-bottom: 20px;
            width: 100%;
            box-sizing: border-box;
            font-size: 16px;
        }

        .form-control:focus {
            outline: none;
            border-bottom-color: #00BCD4;
        }

        .btn-primary {
            background-color: #2196F3;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #00BCD4;
        }

        select {
            padding: 10px;
            width: 100%;
            border: 2px solid #2196F3;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>

    <div class="container mt-5">
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $user->nama) }}" placeholder="Masukan nama anda" required>
            </div>

            <div class="mb-3">
                <label for="npm" class="form-label">NPM</label>
                <input type="text" class="form-control" name="npm" id="npm" value="{{ old('npm', $user->npm) }}" placeholder="Masukan NPM anda" required>
            </div>

            <div class="mb-3">
                <label for="kelas_id">Kelas</label><br>
                <select name="kelas_id" id="kelas_id" required>
                    @foreach ($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}" {{ $kelasItem->id == $user->kelas_id ? 'selected' : '' }}>
                            {{ $kelasItem->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="foto">Foto</label>
                <input type="file" id="foto" class="form-control" name="foto">
                <br>
                @if($user->foto)
                    <img src="{{ asset('storage/upload/' . $user->foto) }}" alt="User Photo" width="100">
                @else
                    <p>Belum ada foto</p>
                @endif
            </div>

            <button type="submit" class="btn-primary">Submit</button>
        </form>
    </div>
@endsection
