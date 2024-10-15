@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f48fb1; 
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    .container {
        max-width: 800px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
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
        margin-bottom: 20px;
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
</style>

<div class="container">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="text-center mb-4" style="color: #90caf9;">Daftar Mahasiswa</h1>
            
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>NPM</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['nama'] ?></td>
                                <td><?= $user['nama_kelas'] ?></td>    
                                <td><?= $user['npm'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
