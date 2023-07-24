<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rincian Pembelian</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

    </style>
</head>

<body>
    <h1>Rincian Pembelian</h1>

    <p>Halo {{ $user->name }},</p>
    <p>Pesananmu Akan Segera Di Proses</p>
    <p>Terima Kasih Sudah Memesan Produk Dari Kami</p>
    <p>Berikut adalah rincian Transaksi Pembelian Anda:</p>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Foto Transfer</th>
                <th>Proses</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($checkout as $checkout) --}}
            <tr>
                <td>{{$checkout->created_at}}</td>
                <td><img style="width: 50px;" src="{{ asset('storage/'. $checkout->foto_transaksi) }}" alt=""></td>
                    @if ($checkout->proses == 0)                                              
                    <td>Menunggu konfirmasi</td>
                    @else
                     <td>Sudah Di Konfirmasi</td>                                       
                    @endif                             
                  
                <td>@currency($checkout->total)</td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total Harga:</td>
                <td>@currency($checkout->total)</td>
            </tr>
        </tfoot>
    </table>
    <p>Note: *Pesanan Anda Akan Di Buat Dalam 2 Hari</p>
    <p>Untuk Lebih lengkapnya, Silahkan Cek Di Riwayat Transaksi</p>
    <h3>Terima Kasih Sudah Memesan💕🤞</h3>
</body>

</html>
