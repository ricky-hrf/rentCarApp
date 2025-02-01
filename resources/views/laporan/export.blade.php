<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <h1>Laporan Transaksi</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">No Polisi</th>
                <th scope="col">Nama Pemesan</th>
                <th scope="col">Alamat</th>
                <th>Tanggal Pesan </th>
                <th>Lama </th>
                <th>Total </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksi as $data)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $data->car->polNumber }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->tgl_pesan }}</td>
                    <td>{{ $data->lama }} hari</td>
                    <td>Rp {{ number_format($data->total, 2, ',', '.') }}</td>
                @empty
                <tr>
                    <td colspan="6">Data transaksi mobil belum ada..</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
