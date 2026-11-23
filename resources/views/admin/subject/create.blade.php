{{-- Modal Tambah Data Mata Pelajaran --}}
<x-admin.modal id="createSubjectModal" title="Tambah Data Mata Pelajaran" :open="$errors->any()">
    <form method="POST" action="{{ route('admin.subject.store') }}" class="space-y-4 p-5">
        @csrf

        <x-admin.input name="name" id="create-subject-name" label="Nama Mata Pelajaran" placeholder="Contoh: Matematika" />

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
