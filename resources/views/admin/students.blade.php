<x-admin.layout>

    {{-- Header --}}
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $title }}</h1>
            <p class="text-gray-700 dark:text-gray-400">Daftar data siswa</p>
        </div>

        <button type="button"
            class="inline-flex min-h-11 cursor-pointer items-center justify-center rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="mr-2 h-3.5 w-3.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
            </svg>
            Add Student
        </button>
    </div>

    <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">

        {{-- Search & Filter --}}
        <div class="flex flex-col gap-3 p-4 md:flex-row md:items-center md:justify-between">
            <form class="w-full md:w-1/2">
                <label for="student-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                        </svg>
                    </div>
                    <input type="text" id="student-search" placeholder="Search student..."
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400">
                </div>
            </form>

            {{-- Filter per kelas --}}
            <form method="GET" action="{{ url('/admin/students') }}" class="w-full md:w-auto">
                <label for="filter-kelas" class="sr-only">Filter kelas</label>
                <select name="kelas" id="filter-kelas" onchange="this.form.submit()"
                    class="block min-h-11 w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white md:w-52">
                    <option value="">&mdash; Semua Kelas &mdash;</option>
                    @foreach ($classrooms as $classroom)
                        <option value="{{ $classroom->id }}" @selected((string) $selectedClass === (string) $classroom->id)>
                            {{ $classroom->name }}
                        </option>
                    @endforeach
                </select>
                <noscript><button type="submit" class="mt-2 rounded-lg bg-blue-700 px-3 py-2 text-sm text-white">Filter</button></noscript>
            </form>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">NO</th>
                        <th scope="col" class="px-4 py-3">NAME</th>
                        <th scope="col" class="px-4 py-3">NIS</th>
                        <th scope="col" class="px-4 py-3">CLASS</th>
                        <th scope="col" class="px-4 py-3">ADDRESS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="whitespace-nowrap px-4 py-3 font-medium text-gray-900 dark:text-white">
                                {{ $student->name }}
                            </td>
                            <td class="px-4 py-3 tabular-nums">{{ $student->nis }}</td>
                            <td class="px-4 py-3">{{ $student->classroom->name ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $student->address }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">
                                Tidak ada data siswa.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Footer --}}
        <div class="p-4 text-sm text-gray-500 dark:text-gray-400">
            Total: <span class="font-semibold text-gray-900 dark:text-white">{{ $students->count() }}</span> students
        </div>
    </div>

</x-admin.layout>
