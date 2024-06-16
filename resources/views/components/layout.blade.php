<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')

    <title>tony 1</title>
</head>
<body class="bg-gray-800 text-gray-200">

    <x-navbar />

    <div class="max-w-6xl mx-auto">
        {{ $slot }}
    </div>

</body>
</html>
