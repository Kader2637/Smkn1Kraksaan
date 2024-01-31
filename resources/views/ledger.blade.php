@extends('layouts.app')
@section('content')
<div class="">
    <div class="d-flex justify-content-between mb-3">
        <p class="text-dark fs-5 " style="font-weight:600">
            Buku Besar
        </p>
        <button class="btn btn-primary">
            Tambah
        </button>
    </div>
</div>
    <div class="table-responsive">
        <table class="table border-1">
            <tbody>
                <tr c>
                    <th  class="text-center border-1 " rowspan="2">
                        No
                    </th>
                    <th  class="text-center border-1" rowspan="2">
                        No Akun
                    </th>
                    <th  class="text-center border-1" rowspan="2">
                        Nama Akun
                    </th>
                    <th  class="text-center border-1" colspan="2">
                        Saldo
                    </th>
                    <th  class="text-center border-1" rowspan="2">
                        Aksi
                    </th>
                </tr>
                <tr>
                    <th  class="text-center border-1" rowspan="2">
                        Debet
                    </th>
                    <th  class="text-center border-1" rowspan="2">
                        Kredit
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
