<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tambah Mobil</h6>
                <form>
                    <div class="mb-3">
                        <label for="polNumber" class="form-label">Nomor Polisi</label>
                        <input type="text" class="form-control" id="polNumber" value="{{ @old('polNumber') }}"
                            wire:model="polNumber">
                        @error('polNumber')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="mark" class="form-label">Merek</label>
                        <input type="mark" class="form-control" id="mark" value="{{ @old('mark') }}"
                            wire:model="mark">
                        @error('mark')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Mobil</label>
                        <select class="form-select" name="jenis" id="jenis" value="{{ @old('jenis') }}"
                            wire:model="jenis">
                            <option value="">---pilih---</option>
                            <option value="sedan">Sedan</option>
                            <option value="MPV">MPV</option>
                            <option value="SUV">SUV</option>
                        </select>
                        @error('jenis')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="harga" class="form-control" id="harga" value="{{ @old('harga') }}"
                            wire:model="harga">
                        @error('harga')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" value="{{ @old('foto') }}"
                            wire:model="foto">
                        @error('foto')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="button" class="btn btn-primary" wire:click="upadate()">Simpan
                        Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
