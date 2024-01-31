<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="tableWrapper">
        <table class="border-1" style="border: 1" cellspacing="0" cellpadding="5">
            <thead>
                <tr>
                    <th class="text-center border-1" rowspan="2">No</th>
                    <th class="text-center border-1" rowspan="2">No Akun</th>
                    <th class="text-center border-1" rowspan="2">Nama Akun</th>
                    <th class="text-center border-1" colspan="2">Saldo</th>
                </tr>
                <tr>
                    <th class="text-center border-1">Debit</th>
                    <th class="text-center border-1">Kredit</th>
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
                            <td class="text-center border-1">-</td>
                        @else
                            <td class="text-center border-1">-</td>
                            <td class="text-center border-1">
                                {{ 'Rp ' . number_format($legder->saldo, 0, ',', '.') }}
                            </td>
                        @endif
                    </tr>
                @empty
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-center border-1">Jumlah</td>
                    <td class="text-center border-1">
                        {{ 'Rp ' . number_format($totalDebit, 0, ',', '.') }}
                    </td>
                    <td class="text-center border-1">
                        {{ 'Rp ' . number_format($totalKredit, 0, ',', '.') }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>
