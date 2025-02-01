<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <h6 class="mb-4">Laporan Transaksi</h6>
                <div class="row">
                    <div class="col-md-4">
                        <input type="date" wire:model="tanggal1" class="form-control" placeholder="Tanggal">
                    </div>
                    <div class="col-md-1">
                        s/d
                    </div>
                    <div class="col-md-4">
                        <input type="date" wire:model="tanggal2" class="form-control" placeholder="Tanggal">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-sm btn-primary" wire:click="cari">Filter</button>
                    </div>
                </div>
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
                                <td>@rupiah($data->total)</td>
                            @empty
                            <tr>
                                <td colspan="6">Data transaksi mobil belum ada..</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $transaksi->links() }}
                <button class="btn btn-danger" wire:click="exportpdf">Export PDF</button>
            </div>
        </div>
    </div>
</div>
