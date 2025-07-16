<x-app-layout>
    <div class="col-span-12 space-y-6 xl:col-span-7">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6">
            <div x-data="{ open: false }">
                <!-- Trigger Button -->
                <button @click="open = true" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Buka Modal
                </button>

                <!-- Modal Overlay -->
                <div x-show="open" x-transition.opacity class="fixed inset-0 z-40 bg-black/30 backdrop-blur-sm"
                    @click.self="open = false" x-cloak>
                </div>

                <!-- Modal Content (di luar backdrop-blur agar tetap tajam) -->
                <div x-show="open" x-transition class="fixed inset-0 z-50 flex items-center justify-center"
                    @click.self="open = false" x-cloak @keydown.escape.window="open = false">

                    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-xl shadow-xl p-6 relative">
                        <!-- Close Button -->
                        <button @click="open = false"
                            class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>

                        <!-- Modal Header -->
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Konfirmasi Aksi</h2>

                        <!-- Modal Body -->
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                            Apakah Anda yakin ingin melanjutkan tindakan ini? Proses ini tidak dapat dibatalkan.
                        </p>

                        <!-- Modal Actions -->
                        <div class="flex justify-end gap-3 mt-4">
                            <button @click="open = false"
                                class="px-4 py-2 rounded bg-gray-200 text-gray-800 hover:bg-gray-300 dark:bg-gray-700 dark:text-white">
                                Batal
                            </button>
                            <button
                                class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400">
                                Lanjutkan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
const modal = document.getElementById('myModal');

function openModal() {
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModal() {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>