<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Storage;

class MobilComponent extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $addPage, $editPage = false;
    public $polNumber, $mark, $jenis, $kapasitas, $harga, $foto, $id;
    public function render()
    {
        $data['mobil'] = Car::paginate(5);
        return view('livewire.mobil-component', $data);
    }

    public function create()
    {
        $this->addPage = true;
    }

    public function store()
    {
        $this->validate([
            'polNumber' => 'required',
            'mark' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
            'foto' => 'required|image'
        ], [
            'polNumber.required' => 'Nomor Polisi tidak boleh kosong!',
            'mark.required' => 'Merek tidak boleh kosong!',
            'jenis.required' => 'Pilih Jenis mobil!',
            'harga.required' => 'Harga mobil tidak boleh kosong!',
            'foto.required' => 'Foto tidak boleh kosong!',
            'foto.image' => 'Foto dalam format image!'
        ]);
        $path = $this->foto->store('mobil', 'public');
        Car::create([
            'user_id' => auth()->user()->id,
            'polNumber' => $this->polNumber,
            'mark' => $this->mark,
            'jenis' => $this->jenis,
            'harga' => $this->harga,
            'foto' => $path
        ]);
        session()->flash('success', 'Berhasil simpan data');
        $this->reset();
    }

    public function edit($id)
    {
        $this->editPage = true;
        $this->id = $id;
        $mobil = Car::find($id);
        $this->polNumber = $mobil->polNumber;
        $this->mark = $mobil->mark;
        $this->jenis = $mobil->jenis;
        $this->harga = $mobil->harga;
    }
    public function update()
    {
        $mobil = Car::find($this->id);
        if (!empty($this->foto)) {
            if ($mobil->foto && Storage::exists($mobil->foto)) {
                Storage::delete($mobil->foto);
            }
            $path = $this->foto->store('mobil', 'public');

            $mobil->update([
                'user_id' => auth()->user()->id,
                'polNumber' => $this->polNumber,
                'mark' => $this->mark,
                'jenis' => $this->jenis,
                'harga' => $this->harga,
                'foto' => $path
            ]);
        } else {
            $mobil->update([
                'user_id' => auth()->user()->id,
                'polNumber' => $this->polNumber,
                'mark' => $this->mark,
                'jenis' => $this->jenis,
                'harga' => $this->harga,
            ]);
        }

        session()->flash('success', 'Berhasil diubah');
        $this->reset();
    }


    public function destroy($id)
    {
        $data = Car::findOrFail($id);
        if ($data->foto) {
            Storage::disk('public')->delete($data->foto);
        }
        $data->delete();
        session()->flash('success', 'berhasil hapus');
        $this->reset();
    }
}
