<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
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
    </style>
</head>
<body>
    <div class="container mt-5">

        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" required>
            </div>

            <div class="mb-3">
                <label for="npm" class="form-label">NPM</label>
                <input type="text" class="form-control" name="npm" id="npm" required>
            </div>

            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" name="kelas" id="kelas" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
</html>