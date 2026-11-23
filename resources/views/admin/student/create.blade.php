{{-- Modal Tambah Data Siswa --}}
<div id="createStudentModal" role="dialog" aria-modal="true" aria-labelledby="createStudentTitle"
    class="{{ $errors->any() ? '' : 'hidden' }} fixed inset-0 z-[60] flex items-center justify-center overflow-y-auto bg-gray-900/50 p-4">

    <div class="relative w-full max-w-lg rounded-xl bg-white shadow-xl dark:bg-gray-800">

        {{-- Header --}}
        <div class="flex items-center justify-between border-b border-gray-200 p-5 dark:border-gray-700">
            <h3 id="createStudentTitle" class="text-lg font-semibold text-gray-900 dark:text-white">Tambah Data Siswa</h3>
            <button type="button" data-close-create-student aria-label="Tutup"
                class="inline-flex h-9 w-9 cursor-pointer items-center justify-center rounded-lg text-gray-400 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 14 14" aria-hidden="true">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 12 12M13 1 1 13" />
                </svg>
            </button>
        </div>

        <form method="POST" action="{{ route('admin.student.store') }}" class="space-y-4 p-5">
            @csrf

            {{-- Nama Siswa --}}
            <div>
                <label for="create-name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Siswa</label>
                <input type="text" id="create-name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama siswa" required
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400">
                @error('name')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- NIS --}}
            <div>
                <label for="create-nis" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">NIS</label>
                <input type="number" id="create-nis" name="nis" value="{{ old('nis') }}" placeholder="Masukkan NIS" required
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400">
                @error('nis')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kelas --}}
            <div>
                <label for="create-classroom" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                <select id="create-classroom" name="classroom_id" required
                    class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($classrooms as $classroom)
                        <option value="{{ $classroom->id }}" @selected((string) old('classroom_id') === (string) $classroom->id)>
                            {{ $classroom->name }}
                        </option>
                    @endforeach
                </select>
                @error('classroom_id')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Alamat --}}
            <div>
                <label for="create-address" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                <textarea id="create-address" name="address" rows="3" placeholder="Masukkan alamat siswa" required
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400">{{ old('address') }}</textarea>
                @error('address')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex items-center justify-end gap-3 pt-2">
                <button type="button" data-close-create-student
                    class="min-h-11 cursor-pointer rounded-lg border border-gray-300 bg-white px-5 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                    Batal
                </button>
                <button type="submit"
                    class="min-h-11 cursor-pointer rounded-lg bg-blue-700 px-5 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    (function () {
        const modal = document.getElementById('createStudentModal');
        const open = () => { modal.classList.remove('hidden'); modal.querySelector('input')?.focus(); };
        const close = () => modal.classList.add('hidden');

        document.querySelectorAll('[data-open-create-student]').forEach(el => el.addEventListener('click', open));
        document.querySelectorAll('[data-close-create-student]').forEach(el => el.addEventListener('click', close));
        modal.addEventListener('click', e => { if (e.target === modal) close(); });
        document.addEventListener('keydown', e => { if (e.key === 'Escape') close(); });
    })();
</script>
