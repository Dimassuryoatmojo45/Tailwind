<x-app-layout>
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: `Input Po`}">
        @include('components.breadcrumb')
    </div>
    <!-- Breadcrumb End -->

    <div class="space-y-5 sm:space-y-6">
        <div class="rounded-2xl border border-gray-200 bg-[#ffff] dark:border-gray-800 dark:bg-[#ffff]/[0.03]">
            <div class="px-5 py-4 sm:px-6 sm:py-5 flex justify-between items-center">
                <h3 class="text-base font-medium text-gray-800 dark:text-[#ffff]/90">
                    Tabel PO
                </h3>
                <div x-data="{ open: false }">
                    <button @click="open = true"
                        class="flex items-center px-3 py-1.5 bg-blue-600 text-[#ffff] rounded hover:bg-blue-700 text-sm">
                        <svg class="w-6 h-6 text-gray-25 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14m-7 7V5" />
                        </svg>
                        Tambah Po
                    </button>

                    <!-- Modal Overlay -->
                    <div x-show="open" x-transition.opacity class="fixed inset-0 z-40 bg-black/30 backdrop-blur-sm"
                        @click.self="open = false" x-cloak>
                    </div>

                    <!-- Modal Content (di luar backdrop-blur agar tetap tajam) -->
                    <div x-show="open" x-transition class="fixed inset-0 z-50 flex items-center justify-center"
                        @click.self="open = false" x-cloak @keydown.escape.window="open = false">


                        <!-- Modal Body -->
                        <form @submit.prevent="open = false" class="space-y-6">
                            <div class="w-full max-w-lg bg-[#ffff] dark:bg-gray-800 rounded-xl shadow-xl relative 
                            max-h-[70vh] overflow-y-auto p-4">
                                <!-- Close Button -->
                                <button @click=" open=false"
                                    class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>

                                <!-- Modal Header -->
                                <h2 class="text-lg font-semibold text-gray-800 dark:text-bg-[#ffff] mb-2">Input PO</h2>

                                <!-- Section: Informasi Pribadi -->
                                <section class="border border-gray-200 dark:border-gray-600 rounded-lg p-4">
                                    <h3 class="text-md font-semibold text-gray-700 dark:text-bg-[#ffff] mb-4">Nama</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                                        <!-- Nama -->
                                        <div>
                                            <label for="name"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                                Nama Artikel
                                            </label>
                                            <input type="text" id="name" name="name" class="w-full rounded-lg border border-gray-300 dark:border-gray-600
                                       bg-[#ffff] dark:bg-gray-700 text-gray-900 dark:text-bg-[#ffff]
                                       focus:ring-blue-500 focus:border-blue-500 px-3 py-2 text-sm" required>
                                        </div>
                                </section>

                                <!-- Section: Informasi Pribadi -->
                                <section class="border border-gray-200 dark:border-gray-600 rounded-lg p-4 mt-2">
                                    <h3 class="text-md font-semibold text-gray-700 dark:text-bg-[#ffff] mb-4">Produk
                                    </h3>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div>
                                            <label for="gender"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                                Jenis Produk
                                            </label>
                                            <select id="gender" name="gender" class="w-full rounded-lg border border-gray-300 dark:border-gray-600
                                                bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                                                focus:ring-blue-500 focus:border-blue-500 px-3 py-2 text-sm">
                                                <option value="">-- Pilih --</option>
                                                <option value="L">Kaos</option>
                                                <option value="L">Workshit / PDH</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="gender"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                                Jenis Bahan
                                            </label>
                                            <select id="gender" name="gender" class="w-full rounded-lg border border-gray-300 dark:border-gray-600
                                                bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                                                focus:ring-blue-500 focus:border-blue-500 px-3 py-2 text-sm">
                                                <option value="">-- Pilih --</option>
                                                <option value="L">Combat 30s</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="gender"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                                Jenis Pengerjaan
                                            </label>
                                            <select id="gender" name="gender" class="w-full rounded-lg border border-gray-300 dark:border-gray-600
                                                bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                                                focus:ring-blue-500 focus:border-blue-500 px-3 py-2 text-sm">
                                                <option value="">-- Pilih --</option>
                                                <option value="L">DTF</option>
                                                <option value="P">Plastisol</option>
                                                <option value="P">Sublime</option>
                                                <option value="P">Bordir</option>
                                            </select>
                                        </div>
                                    </div>
                                </section>

                                <!-- Section: Kontak -->
                                <section class="border border-gray-200 dark:border-gray-600 rounded-lg p-4 mt-2">
                                    <h3 class="text-md font-semibold text-gray-700 dark:text-white mb-4">Warna</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="gender"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                                Warna Kain
                                            </label>
                                            <select id="gender" name="gender" class="w-full rounded-lg border border-gray-300 dark:border-gray-600
                                                bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                                                focus:ring-blue-500 focus:border-blue-500 px-3 py-2 text-sm">
                                                <option value="">-- Pilih --</option>
                                                <option value="L">Merah</option>
                                                <option value="P">Biru</option>
                                                <option value="P">Hijau</option>
                                                <option value="P">Ungu</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="hobi"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                                Warna Sablon
                                            </label>
                                            <select id="hobi" name="hobi[]" multiple
                                                class="select2 w-full rounded-lg border border-gray-300 dark:border-gray-600
                                                         bg-white dark:bg-gray-700 text-sm text-gray-900 dark:text-white">
                                                <option value="musik">Merah</option>
                                                <option value="olahraga">Biru</option>
                                                <option value="membaca">Hijau</option>
                                                <option value="menulis">Ungu</option>
                                            </select>
                                        </div>
                                    </div>
                                </section>

                                <section class="border border-gray-200 dark:border-gray-600 rounded-lg p-4 mt-2">
                                    <h3 class="text-md font-semibold text-gray-700 dark:text-white mb-4">Tambahan</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <!-- Email -->
                                        <div>
                                            <label for="email"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                                Label
                                            </label>
                                            <input type="email" id="email" name="email" class="w-full rounded-lg border border-gray-300 dark:border-gray-600
                                       bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                                       focus:ring-blue-500 focus:border-blue-500 px-3 py-2 text-sm" required>
                                        </div>
                                        <div>
                                            <label for="hobi2"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                                Tambahan Spesifikasi
                                            </label>
                                            <select id="hobi2" name="hobi[]" multiple
                                                class="select2 w-full rounded-lg border border-gray-300 dark:border-gray-600
                                                         bg-white dark:bg-gray-700 text-sm text-gray-900 dark:text-white">
                                                <option value="musik">TIDAK ADA TAMBAHAN</option>
                                                <option value="olahraga">RIB LENGAN</option>
                                                <option value="membaca">GLOW IN THE DARK</option>
                                            </select>
                                        </div>
                                    </div>
                                </section>

                                <section class="border border-gray-200 dark:border-gray-600 rounded-lg p-4 mt-2">
                                    <h3 class="text-md font-semibold text-gray-700 dark:text-white mb-4">Kontak</h3>
                                    <div x-data="{ rows: [0], nextId: 1 }" class="space-y-4">
                                        <!-- Loop Baris Input -->
                                        <template x-for="(id, index) in rows" :key="id">
                                            <div class="grid grid-cols-1 md:grid-cols-12 gap-2 items-end">
                                                <!-- Select 1 -->
                                                <div class="md:col-span-4">
                                                    <label
                                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                                        Size
                                                    </label>
                                                    <select :name="'data[' + index + '][size]'" class="w-full rounded-lg border border-gray-300 dark:border-gray-600
                                                    bg-white dark:bg-gray-700 text-sm text-gray-900 dark:text-white
                                                    focus:ring-blue-500 focus:border-blue-500 px-3 py-2">
                                                        <option value="">-- Pilih Size --</option>
                                                        <option value="a">S</option>
                                                        <option value="b">M</option>
                                                        <option value="b">L</option>
                                                        <option value="b">XL</option>
                                                    </select>
                                                </div>

                                                <!-- Input Number -->
                                                <div class="md:col-span-2">
                                                    <label
                                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                                        Size
                                                    </label>
                                                    <input type="number" min="0" :name="'data[' + index + '][jumlah]'"
                                                        class="w-full rounded-lg border border-gray-300 dark:border-gray-600
                                                        bg-white dark:bg-gray-700 text-sm text-gray-900 dark:text-white
                                                        focus:ring-blue-500 focus:border-blue-500 px-3 py-2" />
                                                </div>

                                                <!-- Select 2 -->
                                                <div class="md:col-span-5">
                                                    <label
                                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                                        Jenis Lengan
                                                    </label>
                                                    <select :name="'data[' + index + '][jenis_lengan]'" class="w-full rounded-lg border border-gray-300 dark:border-gray-600
                                                        bg-white dark:bg-gray-700 text-sm text-gray-900 dark:text-white
                                                        focus:ring-blue-500 focus:border-blue-500 px-3 py-2">
                                                        <option value="">-- Pilih Jenis Lengan --</option>
                                                        <option value="x">LENGAN PANJANG</option>
                                                        <option value="y">LENGAN PENDEK</option>
                                                    </select>
                                                </div>

                                                <!-- Tombol Hapus -->
                                                <div class="md:col-span-1 flex justify-center mt-1 md:mt-6">
                                                    <button type="button" @click="rows.splice(index, 1)"
                                                        class="px-3 py-2 text-gray-25 bg-red-600 rounded hover:bg-red-700">
                                                        &times;
                                                    </button>
                                                </div>
                                            </div>
                                        </template>

                                        <!-- Tombol Tambah -->
                                        <button type="button" @click="rows.push(nextId++)" class="inline-flex items-center px-4 py-2 text-sm font-medium
                                            text-gray-25 bg-blue-600 rounded hover:bg-blue-700">
                                            + Tambah Baris
                                        </button>
                                    </div>
                                </section>

                                <section class="border border-gray-200 dark:border-gray-600 rounded-lg p-4 mt-2">
                                    <h3 class="text-md font-semibold text-gray-700 dark:text-white mb-4">Gambar</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <!-- Email -->
                                        <div class="w-full max-w-sm mx-auto mt-6">
                                            <label class="block mb-2 text-sm font-medium text-gray-700"
                                                for="imageInput">
                                                Gambar Desain
                                            </label>
                                            <input id="imageInput" type="file" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                                                    file:rounded-full file:border-0 file:text-sm file:font-semibold
                                                    file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                                            <div id="imagePreview" class="mt-4">
                                                <!-- Preview akan muncul di sini -->
                                            </div>
                                        </div>
                                        <div class="w-full max-w-sm mx-auto mt-6">
                                            <label class="block mb-2 text-sm font-medium text-gray-700"
                                                for="imageInput2">
                                                Gambar Label
                                            </label>
                                            <input id="imageInput2" type="file" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                                                    file:rounded-full file:border-0 file:text-sm file:font-semibold
                                                    file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                                            <div id="imagePreview2" class="mt-4">
                                                <!-- Preview akan muncul di sini -->
                                            </div>
                                        </div>
                                        <div class="w-full max-w-sm mx-auto mt-6">
                                            <label class="block mb-2 text-sm font-medium text-gray-700"
                                                for="imageInput3">
                                                Gambar Stiker
                                            </label>
                                            <input id="imageInput3" type="file" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                                                    file:rounded-full file:border-0 file:text-sm file:font-semibold
                                                    file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                                            <div id="imagePreview3" class="mt-4">
                                                <!-- Preview akan muncul di sini -->
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <!-- Modal Actions -->
                                <div class="flex justify-end gap-3 mt-4">
                                    <button @click="open = false"
                                        class="px-4 py-2 rounded bg-gray-200 text-gray-800 hover:bg-gray-300 dark:bg-gray-700 dark:text-white">
                                        Batal
                                    </button>
                                    <button
                                        class="px-4 py-2 rounded bg-red-600 text-gray-25 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400">
                                        Lanjutkan
                                    </button>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-5 py-4 sm:px-6 sm:py-5 items-center">
            <div
                class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="col-span-12 xl:col-span-12">
                    <div x-data="dataTable()" class="p-4 bg-[#ffff] dark:bg-gray-900 rounded-lg shadow-md">
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-left text-sm text-gray-600 dark:text-gray-300">
                                <thead class="bg-gray-100 dark:bg-gray-800 text-xs uppercase">
                                    <tr class="border border-gray-200">
                                        <th @click="sort('no')" class="cursor-pointer px-4 py-2">No</th>
                                        <th @click="sort('artikel')" class="cursor-pointer px-4 py-2">
                                            Nama
                                            Artikel
                                        </th>
                                        <th @click="sort('jenis_produk')" class="cursor-pointer px-4 py-2">Jenis
                                            Produk</th>
                                        <th @click="sort('jenis_pengerjaan')" class="cursor-pointer px-4 py-2">Jenis
                                            Pengerjaan</th>
                                        <th @click="sort('jenis_bahan')" class="cursor-pointer px-4 py-2">Jenis
                                            Bahan</th>
                                        <th @click="sort('kuantiti')" class="cursor-pointer px-4 py-2">Kuantiti</th>
                                        <th @click="sort('tgl_input_po')" class="cursor-pointer px-4 py-2">Tanggal
                                            Input PO</th>
                                        <th class="cursor-pointer px-4 py-2">Detail
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="item in paginatedData()" :key="item.id">
                                        <tr class="border-b dark:border-gray-700">
                                            <td class="px-4 py-2" x-text="item.no"></td>
                                            <td class="px-4 py-2" x-text="item.artikel"></td>
                                            <td class="px-4 py-2" x-text="item.jenis_produk"></td>
                                            <td class="px-4 py-2" x-text="item.jenis_pengerjaan"></td>
                                            <td class="px-4 py-2" x-text="item.jenis_bahan"></td>
                                            <td class="px-4 py-2" x-text="item.kuantiti"></td>
                                            <td class="px-4 py-2" x-text="item.tgl_input_po"></td>
                                            <td class="px-4 py-2">
                                                <button class="text-blue-600 hover:underline">Detail</button>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        <div class="flex justify-between items-center mt-4 text-sm">
                            <div>
                                Menampilkan <span x-text="startIndex() + 1"></span> - <span x-text="endIndex()"></span>
                                dari
                                <span x-text="filteredData().length"></span> data
                            </div>
                            <div class="space-x-1">
                                <button @click="prevPage" :disabled="page === 1"
                                    class="px-2 py-1 rounded border dark:border-gray-700">&larr;</button>
                                <template x-for="i in totalPages()">
                                    <button @click="page = i"
                                        :class="page === i ? 'bg-blue-500 text-gray-25' : 'bg-gray-100 dark:bg-gray-700'"
                                        class="px-2 py-1 rounded border dark:border-gray-700" x-text="i"></button>
                                </template>
                                <button @click="nextPage" :disabled="page === totalPages()"
                                    class="px-2 py-1 rounded border dark:border-gray-700">&rarr;</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('#hobi').select2({
            placeholder: "Pilih Warna Sablon",
            allowClear: true,
            width: '100%' // Penting agar Tailwind w-full tetap berlaku
        });

        $('#hobi2').select2({
            placeholder: "Pilih Tambahan Spek",
            allowClear: true,
            width: '100%' // Penting agar Tailwind w-full tetap berlaku
        });
    });

    const input = document.getElementById('imageInput');
    const preview = document.getElementById('imagePreview');

    input.addEventListener('change', function() {
        preview.innerHTML = '';
        const file = this.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = 'Preview Gambar';
                img.className = 'w-full h-auto max-h-64 object-contain rounded-lg shadow';
                preview.appendChild(img);
            };
            reader.readAsDataURL(file);
        } else {
            preview.innerHTML = '<p class="text-red-500 text-sm">File bukan gambar.</p>';
        }
    });

    const input2 = document.getElementById('imageInput2');
    const preview2 = document.getElementById('imagePreview2');

    input2.addEventListener('change', function() {
        preview2.innerHTML = '';
        const file = this.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = 'Preview Gambar';
                img.className = 'w-full h-auto max-h-64 object-contain rounded-lg shadow';
                preview2.appendChild(img);
            };
            reader.readAsDataURL(file);
        } else {
            preview2.innerHTML = '<p class="text-red-500 text-sm">File bukan gambar.</p>';
        }
    });

    const input3 = document.getElementById('imageInput3');
    const preview3 = document.getElementById('imagePreview3');

    input3.addEventListener('change', function() {
        preview3.innerHTML = '';
        const file = this.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = 'Preview Gambar';
                img.className = 'w-full h-auto max-h-64 object-contain rounded-lg shadow';
                preview3.appendChild(img);
            };
            reader.readAsDataURL(file);
        } else {
            preview3.innerHTML = '<p class="text-red-500 text-sm">File bukan gambar.</p>';
        }
    });
    </script>
</x-app-layout>