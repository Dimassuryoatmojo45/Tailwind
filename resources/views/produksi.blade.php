<x-app-layout>
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: `Kerja Produksi`}">
        @include('components.breadcrumb')
    </div>
    <!-- Breadcrumb End -->

    <div class="space-y-5 sm:space-y-6">
        <div x-data="{ open: false }">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Lembar Kerja Produksi
                    </h3>
                </div>
                <div class="p-5 border-t border-gray-100 dark:border-gray-800 sm:p-6">
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
                                                <th @click="sort('jenis_pengerjaan')" class="cursor-pointer px-4 py-2">
                                                    Jenis
                                                    Pengerjaan</th>
                                                <th @click="sort('jenis_bahan')" class="cursor-pointer px-4 py-2">Jenis
                                                    Bahan</th>
                                                <th @click="sort('kuantiti')" class="cursor-pointer px-4 py-2">Kuantiti
                                                </th>
                                                <th @click="sort('tgl_input_po')" class="cursor-pointer px-4 py-2">
                                                    Tanggal
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
                                                        <button class="text-blue-600 hover:underline"
                                                            @click="open = true">Detail</button>

                                                        <!-- Modal Overlay -->
                                                        <div x-show="open" x-transition.opacity
                                                            class="fixed inset-0 z-40 bg-black/30 backdrop-blur-sm"
                                                            @click.self="open = false" x-cloak>
                                                        </div>

                                                        <!-- Modal Content (di luar backdrop-blur agar tetap tajam) -->
                                                        <div x-show="open" x-transition
                                                            class="fixed inset-0 z-50 flex items-center justify-center"
                                                            @click.self="open = false" x-cloak
                                                            @keydown.escape.window="open = false">

                                                            <div
                                                                class="w-full max-w-md bg-[#ffff] dark:bg-gray-800 rounded-xl shadow-xl p-6 relative">
                                                                <!-- Close Button -->
                                                                <button @click="open = false"
                                                                    class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                                                                    <svg class="w-5 h-5" fill="none"
                                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M6 18L18 6M6 6l12 12" />
                                                                    </svg>
                                                                </button>

                                                                <!-- Modal Header -->
                                                                <h2
                                                                    class="text-lg font-semibold text-gray-800 dark:text-slate-50 mb-2">
                                                                    Pengadaan Bahan</h2>

                                                                <!-- Modal Body -->
                                                                <li
                                                                    class="text-base font-medium text-gray-800 dark:text-white/90">
                                                                    Gambar
                                                                </li>
                                                                <div
                                                                    class="grid grid-cols-3 gap-4 p-4 border border-sm rounded-md">
                                                                    <div class="text-center">
                                                                        <img src="https://img.pikbest.com/illustration/20241204/a-drawing-of-a-butterfly-with-the-word-on-it_11205167.jpg!w700wp"
                                                                            alt="Pabrik"
                                                                            class="w-full h-32 object-cover rounded-lg shadow" />
                                                                        <p
                                                                            class="mt-2 text-sm font-medium text-gray-700">
                                                                            Gambar Desain</p>
                                                                    </div>

                                                                    <div class="text-center">
                                                                        <img src="https://i.pinimg.com/736x/93/49/dd/9349dd3376644fca01eb457ff3d42351.jpg"
                                                                            alt="Gudang"
                                                                            class="w-full h-32 object-cover rounded-lg shadow" />
                                                                        <p
                                                                            class="mt-2 text-sm font-medium text-gray-700">
                                                                            Gambar Label</p>
                                                                    </div>

                                                                    <div class="text-center">
                                                                        <img src="https://i.pinimg.com/736x/a0/24/34/a024346b49b3b08e3b5d36ffd011985f.jpg"
                                                                            alt="Penjahitan"
                                                                            class="w-full h-32 object-cover rounded-lg shadow" />
                                                                        <p
                                                                            class="mt-2 text-sm font-medium text-gray-700">
                                                                            Gambar Stiker</p>
                                                                    </div>
                                                                </div>
                                                                <li
                                                                    class="text-base font-medium text-gray-800 dark:text-white/90 mt-2">
                                                                    Detail Po
                                                                </li>
                                                                <div
                                                                    class="grid grid-cols-1 gap-4 p-4 border border-sm rounded-md">
                                                                    <div class="overflow-x-auto p-4">
                                                                        <table
                                                                            class="min-w-full divide-y divide-gray-200 border rounded-lg">
                                                                            <thead class="bg-gray-100">
                                                                                <tr>
                                                                                    <th
                                                                                        class="px-4 py-2 text-left text-sm font-semibold text-gray-700 w-5">
                                                                                        No</th>
                                                                                    <th
                                                                                        class="px-4 py-2 text-right text-sm font-semibold text-gray-700">
                                                                                        Size</th>
                                                                                    <th
                                                                                        class="px-4 py-2 text-right text-sm font-semibold text-gray-700">
                                                                                        Qty</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody class="divide-y divide-gray-100">
                                                                                <tr class="hover:bg-gray-50">
                                                                                    <td
                                                                                        class="px-4 py-2 text-sm text-gray-700 w-5">
                                                                                        1</td>
                                                                                    <td
                                                                                        class="px-4 py-2 text-sm text-right text-gray-700">
                                                                                        S</td>
                                                                                    <td
                                                                                        class="px-4 py-2 text-sm text-right text-gray-700">
                                                                                        3</td>
                                                                                </tr>
                                                                                <tr class="hover:bg-gray-50">
                                                                                    <td
                                                                                        class="px-4 py-2 text-sm text-gray-700 w-5">
                                                                                        2</td>
                                                                                    <td
                                                                                        class="px-4 py-2 text-sm text-right text-gray-700">
                                                                                        M</td>
                                                                                    <td
                                                                                        class="px-4 py-2 text-sm text-right text-gray-700">
                                                                                        1</td>
                                                                                </tr>
                                                                                <!-- Tambahkan baris lain sesuai kebutuhan -->
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>


                                                                <!-- Modal Actions -->
                                                                <div class="flex justify-end gap-3 mt-4">
                                                                    <button @click="open = false"
                                                                        class="px-4 py-2 rounded bg-gray-200 text-gray-800 hover:bg-gray-300 dark:bg-gray-700 dark:text-slate-50">
                                                                        Batal
                                                                    </button>
                                                                    <button
                                                                        class="px-4 py-2 rounded bg-red-600 text-slate-50 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400">
                                                                        Kerjakan
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Pagination -->
                                <div class="flex justify-between items-center mt-4 text-sm">
                                    <div>
                                        Menampilkan <span x-text="startIndex() + 1"></span> - <span
                                            x-text="endIndex()"></span> dari
                                        <span x-text="filteredData().length"></span> data
                                    </div>
                                    <div class="space-x-1">
                                        <button @click="prevPage" :disabled="page === 1"
                                            class="px-2 py-1 rounded border dark:border-gray-700">&larr;</button>
                                        <template x-for="i in totalPages()">
                                            <button @click="page = i"
                                                :class="page === i ? 'bg-blue-500 text-gray-25' : 'bg-gray-100 dark:bg-gray-700'"
                                                class="px-2 py-1 rounded border dark:border-gray-700"
                                                x-text="i"></button>
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
        </div>
    </div>
</x-app-layout>

<script>
function dataTable() {
    return {
        search: '',
        sortBy: 'name',
        sortAsc: true,
        page: 1,
        perPage: 5,
        items: [{
                id: 1,
                no: 1,
                artikel: 'Tim Sepak Bola Sidoarjo',
                jenis_produk: 'Jersey',
                jenis_pengerjaan: 'Sablon DTF',
                jenis_bahan: 'COTTON COMBAT',
                kuantiti: 4,
                tgl_input_po: '2025-07-07'
            },
            {
                id: 2,
                no: 2,
                artikel: 'Karang Taruna Gatra Muda',
                jenis_produk: 'Clothing',
                jenis_pengerjaan: 'Bordir',
                jenis_bahan: 'COTTON COMBAT',
                kuantiti: 5,
                tgl_input_po: '2025-07-05'
            }
        ],
        sort(column) {
            if (this.sortBy === column) {
                this.sortAsc = !this.sortAsc;
            } else {
                this.sortBy = column;
                this.sortAsc = true;
            }
        },
        filteredData() {
            return this.items
                .filter(i =>
                    Object.values(i).some(val =>
                        String(val).toLowerCase().includes(this.search.toLowerCase())
                    )
                )
        },
        paginatedData() {
            const start = (this.page - 1) * this.perPage;
            return this.filteredData().slice(start, start + this.perPage);
        },
        totalPages() {
            return Math.ceil(this.filteredData().length / this.perPage);
        },
        nextPage() {
            if (this.page < this.totalPages()) this.page++;
        },
        prevPage() {
            if (this.page > 1) this.page--;
        },
        startIndex() {
            return (this.page - 1) * this.perPage;
        },
        endIndex() {
            return Math.min(this.page * this.perPage, this.filteredData().length);
        },
    }
}
</script>