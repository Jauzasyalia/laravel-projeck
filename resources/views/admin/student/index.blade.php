<x-admin.layout>

    {{-- Header --}}
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $title }}</h1>
            <p class="text-gray-700 dark:text-gray-400">Daftar data siswa</p>
        </div>

        <button type="button" data-open-create-student
            class="inline-flex min-h-11 cursor-pointer items-center justify-center rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="mr-2 h-3.5 w-3.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
            </svg>
            Add Student
        </button>
    </div>

    {{-- Modal Tambah Data Siswa --}}
    @include('admin.student.create')

    {{-- Alert Success --}}
    @if (session('success'))
        <div role="alert" class="mb-4 flex items-center rounded-lg border border-green-200 bg-green-50 p-4 text-sm font-medium text-green-800 dark:border-green-800 dark:bg-gray-800 dark:text-green-400">
            {{ session('success') }}
        </div>
    @endif

    <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">

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
