<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Add Users</h6>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" value="{{ @old('nama') }}"
                            wire:model="nama">
                        @error('nama')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value="{{ @old('email') }}"
                            wire:model="email">
                        @error('email')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" value="{{ @old('password') }}"
                            wire:model="password">
                        @error('email')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-select" wire:model="role">
                            <option value="">--pilih--</option>
                            <option value="admin">Admin</option>
                            <option value="pemilik">Pemilik</option>
                        </select>
                        @error('role')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="button" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>
