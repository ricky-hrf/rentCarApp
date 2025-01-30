<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class TransaksiComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $addPage, $editPage = false;
    public $nama, $ponsel, $alamat, $lama, $tgl_pesan, $car_id, $harga, $total;
    public function render()
    {
        $data['mobil'] = Car::paginate(5);
        return view('livewire.transaksi-component', $data);
    }

    public function create($id, $harga)
    {
        $this->car_id = $id;
        $this->harga = $harga;
        $this->addPage = true;
    }

    public function hitung()
    {
        $lama = $this->lama;
        $harga = $this->harga;
        $this->total = $lama * $harga;
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'ponsel' => 'required',
            'alamat' => 'required',
            'lama' => 'required',
            'tgl_pesan' => 'required'
        ], [
            'nama.required' => 'nama tidak boleh kosong',
            'ponsel.required' => 'Nomor ponsel tidak boleh kosong',
            'alamat.required' => 'alamat tidak boleh kosong',
            'lama.required' => 'lama tidak boleh kosong',
            'tgl_pesan.required' => 'Tanggal pesan tidak boleh kosong',
        ]);
    }
}
