<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Admin</title>
</head>

<body class="antialiased bg-gray-50 dark:bg-gray-900">

    {{-- Navbar --}}
    <x-admin.navbar />

    {{-- Sidebar --}}
    <x-admin.sidebar />

    {{-- Main Content --}}
    <main class="p-4 md:ml-64 min-h-screen pt-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- $slot adalah variabel untuk mengambil data dari penerima --}}
            {{ $slot }}
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>
</html>
