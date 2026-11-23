{{-- Modal Tambah Data Guru --}}
<x-admin.modal id="createTeacherModal" title="Tambah Data Guru" :open="$errors->any()">
    <form method="POST" action="{{ route('admin.teacher.store') }}" class="space-y-4 p-5">
        @csrf

        <x-admin.input name="name" id="create-teacher-name" label="Nama Guru" placeholder="Masukkan nama guru" />

        <x-admin.input name="niy" id="create-teacher-niy" label="NIY (10 digit)" type="text" placeholder="Masukkan NIY 10 digit"
            extra='inputmode="numeric" pattern="[0-9]{10}" maxlength="10"' />

        <x-admin.select name="subject_id" id="create-teacher-subject" label="Mata Pelajaran" placeholder="-- Pilih Mata Pelajaran --">
            @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}" @selected((string) old('subject_id') === (string) $subject->id)>
                    {{ $subject->name }}
                </option>
            @endforeach
        </x-admin.select>

        <x-admin.input name="start_date" id="create-teacher-start-date" label="Tanggal Mulai" type="date" />

        <div class="flex items-center justify-end gap-3 pt-2">
            <button type="button" data-close-modal
                class="min-h-11 cursor-pointer rounded-lg border border-gray-300 bg-white px-5 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                Batal
            </button>
            <button type="submit"
                class="min-h-11 cursor-pointer rounded-lg bg-blue-700 px-5 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700">
                Simpan
            </button>
        </div>
    </form>
</x-admin.modal>
