<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tambah Transaksi</h6>
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control" id="nama" value="{{ @old('nama') }}"
                            wire:model="nama">
                        @error('nama')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="ponsel" class="form-label">Nomor Ponsel Pemesan</label>
                        <input type="ponsel" class="form-control" id="ponsel" value="{{ @old('ponsel') }}"
                            wire:model="ponsel">
                        @error('ponsel')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Pemesan</label>
                        <input type="alamat" class="form-control" id="alamat" value="{{ @old('alamat') }}"
                            wire:model="alamat">
                        @error('alamat')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="lama" class="form-label">Lama Pemesanan</label>
                        <input type="lama" class="form-control" id="lama" value="{{ @old('lama') }}"
                            wire:model="lama">
                        @error('lama')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tgl_pesan" class="form-label">Tanggal Pemesanan</label>
                        <input type="tgl_pesan" class="form-control" id="tgl_pesan" value="{{ @old('tgl_pesan') }}"
                            wire:model="tgl_pesan">
                        @error('tgl_pesan')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="button" class="btn btn-primary" wire:click="store">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
