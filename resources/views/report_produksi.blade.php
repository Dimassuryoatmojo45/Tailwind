<x-app-layout>
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: `Report Produksi`}">
        @include('components.breadcrumb')
    </div>
    <!-- Breadcrumb End -->

    <div class="space-y-5 sm:space-y-6">
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-5 py-4 sm:px-6 sm:py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Laporan Proses Produksi
                </h3>
            </div>
            <div class="p-5 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="col-span-12 xl:col-span-12">
                        <div x-data="dataTable()" class="p-4 bg-[#ffff] dark:bg-gray-900 rounded-lg shadow-md">
                            <!-- Search -->
                            <div class="mb-4">
                                <input x-model="search" type="text" placeholder="Cari nama..."
                                    class="w-30 px-4 py-2 border rounded-md dark:bg-gray-800 dark:text-[#ffff] dark:border-gray-600" />
                            </div>
                            <div class="flex gap-2 mb-4">
                                <button @click="exportCSV()"
                                    class="px-3 py-1.5 bg-green-600 text-[#ffff] rounded hover:bg-green-700 text-sm">
                                    Export CSV
                                </button>
                                <button @click="exportExcel()"
                                    class="px-3 py-1.5 bg-blue-600 text-[#ffff] rounded hover:bg-blue-700 text-sm">
                                    Export Excel
                                </button>
                            </div>
                            <!-- Table -->
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-left text-sm text-gray-600 dark:text-gray-300">
                                    <thead class="bg-gray-100 dark:bg-gray-800 text-xs uppercase">
                                        <tr class="border border-gray-200">
                                            <th rowspan="2" @click="sort('no')" class="cursor-pointer px-4 py-2">No</th>
                                            <th rowspan="2" @click="sort('artikel')" class="cursor-pointer px-4 py-2">
                                                Nama
                                                Artikel
                                            </th>
                                            <th colspan="9" class="text-center cursor-pointer px-4 py-2">
                                                Proses Produksi</th>
                                            <th rowspan="2" @click="sort('tgl_input_po')"
                                                class="cursor-pointer px-4 py-2">Tanggal
                                                Input PO</th>
                                            <th rowspan="2" @click="sort('tgl_deadline')"
                                                class="cursor-pointer px-4 py-2">Tanggal Deadline
                                            </th>
                                            <th colspan="1" class="cursor-pointer px-4 py-2">Action
                                            </th>
                                        </tr>
                                        <tr class="border border-gray-200">
                                            <th @click="sort('pengadaan_bahan')" class="cursor-pointer px-4 py-2">
                                                Pengadaan Bahan
                                            </th>
                                            <th @click="sort('setting_bahan')" class="cursor-pointer px-4 py-2">Setting
                                                Bahan
                                            </th>
                                            <th @click="sort('afdruk')" class="cursor-pointer px-4 py-2">
                                                Afdruk
                                            </th>
                                            <th @click="sort('profing')" class="cursor-pointer px-4 py-2">
                                                Profing
                                            </th>
                                            <th @click="sort('produksi_kain')" class="cursor-pointer px-4 py-2">
                                                Produksi Kain
                                            </th>
                                            <th @click="sort('sablon')" class="cursor-pointer px-4 py-2">
                                                Sablon
                                            </th>
                                            <th @click="sort('finishing_jahit')" class="cursor-pointer px-4 py-2">
                                                Finishing Jahit
                                            </th>
                                            <th @click="sort('packing')" class="cursor-pointer px-4 py-2">
                                                Packing
                                            </th>
                                            <th @click="sort('selesai')" class="cursor-pointer px-4 py-2">
                                                Selesai
                                            </th>
                                            <th class="cursor-pointer px-4 py-2">
                                                Detail
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="item in paginatedData()" :key="item.id">
                                            <tr class="border-b dark:border-gray-700">
                                                <td class="px-4 py-2" x-text="item.no"></td>
                                                <td class="px-4 py-2" x-text="item.artikel"></td>
                                                <td class="px-4 py-2" x-text="item.pengadaan_bahan"></td>
                                                <td class="px-4 py-2" x-text="item.setting_bahan"></td>
                                                <td class="px-4 py-2" x-text="item.afdruk"></td>
                                                <td class="px-4 py-2" x-text="item.profing"></td>
                                                <td class="px-4 py-2" x-text="item.produksi_kain"></td>
                                                <td class="px-4 py-2" x-text="item.sablon"></td>
                                                <td class="px-4 py-2" x-text="item.finishing_jahit"></td>
                                                <td class="px-4 py-2" x-text="item.packing"></td>
                                                <td class="px-4 py-2" x-text="item.selesai"></td>
                                                <td class="px-4 py-2" x-text="item.tgl_input_po"></td>
                                                <td class="px-4 py-2" x-text="item.tgl_deadline"></td>
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
                artikel: 'Jersey Printing',
                pengadaan_bahan: '2025-07-05',
                setting_bahan: '2025-07-05',
                afdruk: '2025-07-05',
                profing: '2025-07-05',
                produksi_kain: '2025-07-05',
                sablon: '2025-07-05',
                finishing_jahit: '2025-07-05',
                packing: '2025-07-05',
                selesai: '2025-07-05',
                tgl_input_po: '2025-07-07',
                tgl_deadline: '2025-07-14'
            },
            {
                id: 2,
                no: 2,
                artikel: 'Kaos Polos',
                pengadaan_bahan: '2025-07-04',
                setting_bahan: '',
                afdruk: '',
                profing: '',
                produksi_kain: '',
                sablon: '',
                finishing_jahit: '',
                packing: '',
                selesai: '',
                tgl_input_po: '2025-07-05',
                tgl_deadline: '2025-07-10'
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
        exportCSV() {
            const headers = [
                'No', 'Nama Artikel', 'Pengadaan Bahan', 'Setting Bahan', 'Afdruk', 'Profing', 'Produksi Kain',
                'Sablon', 'Finishing Jahit', 'Packing', 'Selesai', 'Tanggal Input PO', 'Tanggal Deadline'
            ];
            const rows = this.filteredData().map((item, index) => [
                this.startIndex() + index + 1,
                item.artikel,
                item.pengadaan_bahan,
                item.setting_bahan,
                item.afdruk,
                item.profing,
                item.produksi_kain,
                item.sablon,
                item.finishing_jahit,
                item.packing,
                item.selesai,
                item.tgl_input_po,
                item.tgl_deadline
            ]);

            let csvContent = "data:text/csv;charset=utf-8," + [headers.join(','), ...rows.map(e => e.join(','))].join(
                '\n');
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "laporan_produksi.csv");
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        },

        exportExcel() {
            const ws_data = [
                [
                    'No', 'Nama Artikel', 'Pengadaan Bahan', 'Setting Bahan', 'Afdruk', 'Profing', 'Produksi Kain',
                    'Sablon', 'Finishing Jahit', 'Packing', 'Selesai', 'Tanggal Input PO', 'Tanggal Deadline'
                ],
                ...this.filteredData().map((item, index) => [
                    this.startIndex() + index + 1,
                    item.artikel,
                    item.pengadaan_bahan,
                    item.setting_bahan,
                    item.afdruk,
                    item.profing,
                    item.produksi_kain,
                    item.sablon,
                    item.finishing_jahit,
                    item.packing,
                    item.selesai,
                    item.tgl_input_po,
                    item.tgl_deadline
                ])
            ];

            const wb = XLSX.utils.book_new();
            const ws = XLSX.utils.aoa_to_sheet(ws_data);
            XLSX.utils.book_append_sheet(wb, ws, "Laporan Produksi");
            XLSX.writeFile(wb, "laporan_produksi.xlsx");
        },
    };
}
</script>