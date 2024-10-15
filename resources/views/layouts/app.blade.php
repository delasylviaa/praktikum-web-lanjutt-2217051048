<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpEPjJIsv5WaRU90oReRpok6YctnVmnDr5pNIyT2bRjxJhOJMyjY6HwALEwIH" 
    crossorigin="anonymous">
</head>

<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvprcYf0tY3lHB6ONNmKz0s5g9DVZLEsaAA55NDzOxhy9GkcIds1kIeN7N6j1eHz" 
    crossorigin="anonymous"></script>
</body>

</html>
