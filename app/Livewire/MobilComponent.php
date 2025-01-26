<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;

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
            'foto.image' => 'Foto dalam format image!',
        ]);
        $this->foto->storeAs('public/mobil', $this->foto->hashName());
        Car::create([
            'user_id' => auth()->Car::user()->id,
            'polNumber' => $this->polNumber,
            'mark' => $this->mark,
            'jenis' => $this->jenis,
            'harga' => $this->harga,
            'foto' => $this->foto->hashName()
        ]);
        session()->flash('success', 'berhasil simpan data');
        $this->reset();
    }
    public function update(){
        $mobil = Car::find($this->id);
        if(empty($this->foto)){
            Car::create([
                'user_id'=>auth()->user()->id;
            ]);
        }
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
    public function destroy($id)
    {
        $mobil = Car::find($id);
        unlink(public_path('storage/mobil' . $mobil->foto));
        $mobil->delete();
        session()->flash('success', 'berhasil hapus');
        $this->reset();
    }
}
