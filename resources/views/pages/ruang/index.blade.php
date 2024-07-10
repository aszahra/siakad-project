<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ruang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex gap-4">
                <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="bg-slate-100 rounded-xl p-4">
                            FORM TAMBAH RUANG
                        </div>
                        <div>
                            <form action="{{route('ruang.store') }}" method="post">
                                @csrf
                                <div class="my-5">
                                    <label for="kode_ruang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Ruang</label>
                                    <input type="text" id="kode_ruang" name="kode_ruang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan kode ruang disini.." value="{{$kode_ruang}}" readonly required />
                                </div>
                                <div class="mb-5">
                                    <label for="ruang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ruang</label>
                                    <input type="text" id="ruang" name="ruang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan ruang disini.." required />
                                </div>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="bg-slate-100 rounded-xl p-4">
                            DATA RUANG
                        </div>
                        <div>
                            <div class="p-12" style="width:100%">
                                <table class="table table-bordered" id="ruang-datatable">
                                    <thead>
                                        <tr>
                                            <th class="w-7">No.</th>
                                            <th>Kode Ruang</th>
                                            <th>Ruang</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            console.log('RUN!');
            $('#ruang-datatable').DataTable({
                ajax: {
                    url: 'api/ruang',
                    dataSrc: 'ruang'
                },
                initComplete: function() {
                    // Menengahkan teks di semua sel pada header (baris pertama)
                    $('#ruang-datatable thead th').css('text-align', 'center');
                },
                columns: [{
                    data: 'no',
                    render: (data, type, row, meta) => {
                        return `<div style="text-align:center">${meta.row + 1}.</div>`;;
                    }
                }, {
                    data: 'kode_ruang',
                    render: (data, type, row) => {
                        return data;
                    }
                }, {
                    data: 'ruang',
                    render: (data, type, row) => {
                        return data;
                    }
                }, {
                    data: {
                        id: 'id',
                        ruang: 'ruang'
                    },
                    render: (data, type, row) => {
                        let editUrl =
                            `<button type="button" data-id="${data.id}"
                                                        data-modal-target="sourceModal" data-kode_ruang="${data.kode_ruang}" data-ruang="${data.ruang}"
                                                        onclick="editSourceModal(this)"
                                                        class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                       <i class="fas fa-edit"></i>
                                                    </button>`;
                        let deleteUrl =
                            `<button onclick="return ruangDelete('${data.id}','${data.ruang}')" class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white"><i class="fas fa-trash"></i></button>`;
                        return `<div style="text-align:center">${editUrl} ${deleteUrl}</div>`;
                    }
                }, ],
            });
        });
    </script>
</x-app-layout>