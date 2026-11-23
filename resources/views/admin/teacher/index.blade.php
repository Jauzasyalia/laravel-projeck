<x-admin.layout>

    {{-- Header --}}
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $title }}</h1>
            <p class="text-gray-700 dark:text-gray-400">Daftar guru beserta mata pelajaran yang diajar</p>
        </div>

        <button type="button" data-open-modal="createTeacherModal"
            class="inline-flex min-h-11 cursor-pointer items-center justify-center rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="mr-2 h-3.5 w-3.5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
            </svg>
            Tambah Guru
        </button>
    </div>

    {{-- Modal Tambah Data Guru --}}
    @include('admin.teacher.create')

    <x-admin.alert />

    <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">No</th>
                        <th scope="col" class="px-4 py-3">Name</th>
                        <th scope="col" class="px-4 py-3">NIY</th>
                        <th scope="col" class="px-4 py-3">Subject</th>
                        <th scope="col" class="px-4 py-3">Start Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teachers as $teacher)
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <th scope="row" class="whitespace-nowrap px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $teacher->name }}</th>
                            <td class="px-4 py-3 tabular-nums">{{ $teacher->niy }}</td>
                            <td class="px-4 py-3">{{ $teacher->subject->name ?? '-' }}</td>
                            <td class="px-4 py-3">{{ \Illuminate\Support\Carbon::parse($teacher->start_date)->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">
                                Tidak ada data guru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 text-sm text-gray-500 dark:text-gray-400">
            Total: <span class="font-semibold text-gray-900 dark:text-white">{{ count($teachers) }}</span> teachers
        </div>
    </div>
</x-admin.layout>
