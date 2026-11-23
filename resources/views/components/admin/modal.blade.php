@props(['id', 'title', 'open' => false])

{{-- Modal umum: buka dengan tombol [data-open-modal="{{ $id }}"], tutup dengan [data-close-modal] / klik backdrop / Esc --}}
<div id="{{ $id }}" role="dialog" aria-modal="true" aria-labelledby="{{ $id }}-title"
    class="{{ $open ? '' : 'hidden' }} fixed inset-0 z-[60] flex items-center justify-center overflow-y-auto bg-gray-900/50 p-4">

    <div class="relative w-full max-w-lg rounded-xl bg-white shadow-xl dark:bg-gray-800">

        {{-- Header --}}
        <div class="flex items-center justify-between border-b border-gray-200 p-5 dark:border-gray-700">
            <h3 id="{{ $id }}-title" class="text-lg font-semibold text-gray-900 dark:text-white">{{ $title }}</h3>
            <button type="button" data-close-modal aria-label="Tutup"
                class="inline-flex h-9 w-9 cursor-pointer items-center justify-center rounded-lg text-gray-400 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 14 14" aria-hidden="true">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 12 12M13 1 1 13" />
                </svg>
            </button>
        </div>

        {{ $slot }}
    </div>
</div>

@once
    <script>
        (function () {
            const open = (modal) => { modal.classList.remove('hidden'); modal.querySelector('input, select, textarea')?.focus(); };
            const close = (modal) => modal.classList.add('hidden');

            document.querySelectorAll('[data-open-modal]').forEach(btn => {
                btn.addEventListener('click', () => {
                    const modal = document.getElementById(btn.dataset.openModal);
                    if (modal) open(modal);
                });
            });
            document.querySelectorAll('[data-close-modal]').forEach(btn => {
                btn.addEventListener('click', () => close(btn.closest('[role=dialog]')));
            });
            document.querySelectorAll('[role=dialog]').forEach(modal => {
                modal.addEventListener('click', e => { if (e.target === modal) close(modal); });
            });
            document.addEventListener('keydown', e => {
                if (e.key === 'Escape') document.querySelectorAll('[role=dialog]').forEach(close);
            });
        })();
    </script>
@endonce
