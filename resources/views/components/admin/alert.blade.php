{{-- Pesan flash sukses: session('success') --}}
@if (session('success'))
    <div role="alert" class="mb-4 flex items-center rounded-lg border border-green-200 bg-green-50 p-4 text-sm font-medium text-green-800 dark:border-green-800 dark:bg-gray-800 dark:text-green-400">
        {{ session('success') }}
    </div>
@endif
