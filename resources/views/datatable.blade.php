<x-app-layout>
    <div class="col-span-12 xl:col-span-12">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6">
            <div x-data="dataTable()" class="p-4 bg-[#ffff] dark:bg-gray-900 rounded-lg shadow-md">
                <!-- Search -->
                <div class="mb-4">
                    <input x-model="search" type="text" placeholder="Cari nama..."
                        class="w-full px-4 py-2 border rounded-md dark:bg-gray-800 dark:text-[#ffff] dark:border-gray-600" />
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
                            <tr>
                                <th @click="sort('name')" class="cursor-pointer px-4 py-2">Nama</th>
                                <th @click="sort('email')" class="cursor-pointer px-4 py-2">Email</th>
                                <th @click="sort('status')" class="cursor-pointer px-4 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="item in paginatedData()" :key="item.id">
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-2" x-text="item.name"></td>
                                    <td class="px-4 py-2" x-text="item.email"></td>
                                    <td class="px-4 py-2">
                                        <span x-text="item.status"
                                            :class="item.status === 'Aktif' ? 'text-green-600' : 'text-red-500'"></span>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-4 text-sm">
                    <div>
                        Menampilkan <span x-text="startIndex() + 1"></span> - <span x-text="endIndex()"></span> dari
                        <span x-text="filteredData().length"></span> data
                    </div>
                    <div class="space-x-1">
                        <button @click="prevPage" :disabled="page === 1"
                            class="px-2 py-1 rounded border dark:border-gray-700">&larr;</button>
                        <template x-for="i in totalPages()">
                            <button @click="page = i"
                                :class="page === i ? 'bg-blue-500 text-white' : 'bg-gray-100 dark:bg-gray-700'"
                                class="px-2 py-1 rounded border dark:border-gray-700" x-text="i"></button>
                        </template>
                        <button @click="nextPage" :disabled="page === totalPages()"
                            class="px-2 py-1 rounded border dark:border-gray-700">&rarr;</button>
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
                name: 'Dimas',
                email: 'dimas@mail.com',
                status: 'Aktif'
            },
            {
                id: 2,
                name: 'Andi',
                email: 'andi@mail.com',
                status: 'Nonaktif'
            },
            {
                id: 3,
                name: 'Sari',
                email: 'sari@mail.com',
                status: 'Aktif'
            },
            {
                id: 4,
                name: 'Budi',
                email: 'budi@mail.com',
                status: 'Aktif'
            },
            {
                id: 5,
                name: 'Tono',
                email: 'tono@mail.com',
                status: 'Nonaktif'
            },
            {
                id: 6,
                name: 'Sinta',
                email: 'sinta@mail.com',
                status: 'Aktif'
            },
            {
                id: 7,
                name: 'Lina',
                email: 'lina@mail.com',
                status: 'Nonaktif'
            },
            {
                id: 8,
                name: 'Rio',
                email: 'rio@mail.com',
                status: 'Aktif'
            },
            {
                id: 9,
                name: 'Nina',
                email: 'nina@mail.com',
                status: 'Nonaktif'
            },
            {
                id: 10,
                name: 'Agus',
                email: 'agus@mail.com',
                status: 'Aktif'
            },
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
                .filter(i => i.name.toLowerCase().includes(this.search.toLowerCase()))
                .sort((a, b) => {
                    let valA = a[this.sortBy];
                    let valB = b[this.sortBy];
                    return (this.sortAsc ? valA > valB : valA < valB) ? 1 : -1;
                });
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
            const headers = ['Nama', 'Email', 'Status'];
            const rows = this.filteredData().map(i => [i.name, i.email, i.status]);

            let csvContent = "data:text/csv;charset=utf-8," + [headers.join(','), ...rows.map(e => e.join(','))].join(
                '\n');

            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "data.csv");
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        },
        exportExcel() {
            const ws_data = [
                ['Nama', 'Email', 'Status'],
                ...this.filteredData().map(i => [i.name, i.email, i.status])
            ];
            const wb = XLSX.utils.book_new();
            const ws = XLSX.utils.aoa_to_sheet(ws_data);
            XLSX.utils.book_append_sheet(wb, ws, "Data");
            XLSX.writeFile(wb, "data.xlsx");
        },
    };
}
</script>