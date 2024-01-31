@extends('layouts.app')
@section('content')
    <div class="">
        <div class="d-flex justify-content-between mb-3">
            <p class="text-dark fs-5 " style="font-weight:600">
                Buku Besar
            </p>
            <div class="d-flex justify-content-header gap-3">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".adddata">
                    Tambah
                </button>
                <button id="downloadButton" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M5 20h14v-2H5m14-9h-4V3H9v6H5l7 7z" />
                    </svg>
                </button>

            </div>
        </div>
    </div>
    {{-- modal add  --}}
    <div class="modal fade adddata" tabindex="-1" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Tambah Buku Besar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('legder.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-xl-6 mt-2">
                                <label for="">No Akun</label>
                                <input type="number" class="form-control" name="no_account" id="">
                            </div>
                            <div class="col-12 col-xl-6 mt-2">
                                <label for="">Nama Akun</label>
                                <input type="text" class="form-control" name="name_account" id="">
                            </div>
                            <div class="col-12 col-xl-6 mt-2">
                                <label for="">Saldo</label>
                                <input type="text" class="form-control" name="saldo" oninput="formatRupiah(this)"
                                    onblur="removeFormat(this)">
                            </div>
                            <div class="col-12 col-xl-6 mt-2">
                                <label for="">Nama Akun</label> <br>
                                <div class="d-flex justify-content-header gap-2">
                                    <input type="radio" name="type_saldo" value="debit" id="">Debit
                                    <input type="radio" name="type_saldo" value="kredit" id="">Kredit
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="">Tanggal</label>
                                <input type="date" class="form-control" name="date">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal  --}}
    {{-- modal add  --}}
    <div class="modal fade updatedata" tabindex="-1" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Edit Buku Besar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="form-update">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-xl-6 mt-2">
                                <label for="">No Akun</label>
                                <input type="number" class="form-control no_account" name="no_account" id="">
                            </div>
                            <div class="col-12 col-xl-6 mt-2">
                                <label for="">Nama Akun</label>
                                <input type="text" class="form-control name_account" name="name_account" id="">
                            </div>
                            <div class="col-12 col-xl-6 mt-2">
                                <label for="">Saldo</label>
                                <input type="text" class="form-control saldo" name="saldo"
                                    oninput="formatRupiah(this)" onblur="removeFormat(this)">
                            </div>
                            <div class="col-12 col-xl-6 mt-2">
                                <label for="">Nama Akun</label> <br>
                                <div class="d-flex justify-content-header gap-2">
                                    <input type="radio" class="type_saldodebit" name="type_saldo" value="debit"
                                        id="">Debit
                                    <input type="radio" class="type_saldokredit" name="type_saldo" value="kredit"
                                        id="">Kredit
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="">Tanggal</label>
                                <input type="date" class="form-control date" name="date">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal  --}}
    <div class="table-responsive">
        <table class="table align-middle table-nowrap mb-0">
            <thead class="table-light">
                <tr>
                    <th class="text-center border-1 align-middle" rowspan="2">
                        No
                    </th>
                    <th class="text-center border-1 align-middle" rowspan="2">
                        No Akun
                    </th>
                    <th class="text-center border-1 align-middle" rowspan="2">
                        Nama Akun
                    </th>
                    <th class="text-center border-1 align-middle" colspan="2">
                        Saldo
                    </th>
                    <th class="text-center border-1 align-middle" rowspan="2">
                        Aksi
                    </th>
                </tr>
                <tr>
                    <th class="text-center border-1 align-middle" rowspan="2">
                        Debit
                    </th>
                    <th class="text-center border-1 align-middle" rowspan="2">
                        Kredit
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($legders as $index=>$legder)
                    <tr>
                        <td class="text-center border-1">
                            {{ $index + 1 }}
                        </td>
                        <td class="text-center border-1">
                            {{ $legder->no_account }}
                        </td>
                        <td class="text-center border-1">
                            {{ $legder->name_account }}
                        </td>
                        @if ($legder->type_saldo === 'debit')
                            <td class="text-center border-1">
                                {{ 'Rp ' . number_format($legder->saldo, 0, ',', '.') }}
                            </td>
                            <td class="text-center">
                                -
                            </td>
                        @else
                            <td class="text-center">
                                -
                            </td>
                            <td class="text-center border-1">
                                {{ 'Rp ' . number_format($legder->saldo, 0, ',', '.') }}
                            </td>
                        @endif
                        <td class="text-center border-1">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-primary btn-edit" data-id="{{ $legder->id }}"
                                    id="{{ $legder->id }}" data-name_account="{{ $legder->name_account }}"
                                    data-no_account="{{ $legder->no_account }}" data-saldo="{{ $legder->saldo }}"
                                    data-type_saldo="{{ $legder->type_saldo }}" data-date="{{ $legder->date }}">
                                    Edit
                                </button>
                                <button class="btn btn-danger btn-delete" data-id="{{ $legder->id }}"
                                    id="{{ $legder->id }}">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('nodata.png') }}" width="300px
                                "
                                    alt="">
                            </div>
                            <p class="text-center fs-5 mt-4" style="font-weight:700">
                                Data Masih Kosong
                            </p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-center border-1">
                        Jumlah
                    </td>
                    <td class="text-center border-1">
                        {{ 'Rp ' . number_format($totalDebit, 0, ',', '.') }}
                    </td>
                    <td class="text-center border-1">
                        {{ 'Rp ' . number_format($totalKredit, 0, ',', '.') }}
                    </td>
                    <td class="text-center border-1">
                        Total : {{ 'Rp ' . number_format($total, 0, ',', '.') }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <x-delete-modal-component />
@endsection
@section('script')
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
    <script>
        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            var name_account = $(this).data('name_account');
            var saldo = $(this).data('saldo');
            var date = $(this).data('date');
            var no_account = $(this).data('no_account');
            $('#form-update').attr('action', '/legder_update/' + id);
            $('.no_account').val(no_account);
            $('.saldo').val(saldo);
            $('.date').val(date);
            var type_saldo = $(this).data('type_saldo');
            if (type_saldo === 'kredit') {
                $('.type_saldokredit').val(type_saldo).prop('checked', true);
                $('.type_saldodebit').val('debit');
            } else if (type_saldo === 'debit') {
                $('.type_saldokredit').val('kredit');
                $('.type_saldodebit').val(type_saldo).prop('checked', true);
            } else {
                $('.type_saldokredit').val('kredit');
                $('.type_saldodebit').val('debit');
            }
            $('.name_account').val(name_account);
            $('.updatedata').modal('show');
        });
        $('.btn-delete').click(function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/legder_delete/' + id);
            $('#modal-delete').modal('show');
        });

        function formatRupiah(input) {
            // Mengambil nilai input tanpa karakter non-digit
            let value = input.value.replace(/\D/g, '');

            // Format nilai menjadi rupiah
            let formattedValue = '';
            if (value.length > 0) {
                formattedValue = 'Rp ' + parseInt(value).toLocaleString('id-ID');
            }

            // Mengganti nilai input dengan format rupiah
            input.value = formattedValue;
        }

        function removeFormat(input) {
            // Menghapus format rupiah sebelum mengirimkan data
            let value = input.value.replace(/[^0-9]/g, '');

            // Mengganti nilai input dengan versi tanpa format rupiah
            input.value = value;
        }
        document.getElementById("downloadButton").addEventListener("click", function() {
            // Open "importlegders" page in a new window/tab
            var importlegdersWindow = window.open("importlegders");

            // Wait for the "importlegders" page to load
            importlegdersWindow.addEventListener("load", function() {
                // Get the table element from the "importlegders" page
                var table = importlegdersWindow.document.querySelector("table");

                // Convert the table to a workbook object
                var workbook = XLSX.utils.table_to_book(table);

                // Convert the workbook to a binary Excel file
                var excelFile = XLSX.write(workbook, {
                    bookType: "xlsx",
                    type: "binary"
                });

                // Convert the binary data to a Blob object
                var blob = new Blob([s2ab(excelFile)], {
                    type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                });

                // Create a temporary link element
                var link = document.createElement("a");
                link.href = URL.createObjectURL(blob);

                // Set the filename for the download
                link.download = "bukubesar.xlsx";

                // Programmatically trigger the download
                link.click();

                // Clean up resources
                URL.revokeObjectURL(link.href);

                // Close the "importlegders" window/tab
                importlegdersWindow.close();
            });
        });

        // Utility function to convert a string to an ArrayBuffer
        function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i = 0; i < s.length; i++) {
                view[i] = s.charCodeAt(i) & 0xFF;
            }
            return buf;
        }
    </script>
@endsection
