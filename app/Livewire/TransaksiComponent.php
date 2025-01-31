<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Transaction;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class TransaksiComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $addPage, $lihatPage = false;
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
            'tgl_pesan' => 'required',
        ], [
            'nama.required' => 'nama tidak boleh kosong',
            'ponsel.required' => 'Nomor ponsel tidak boleh kosong',
            'alamat.required' => 'alamat tidak boleh kosong',
            'lama.required' => 'lama tidak boleh kosong',
            'tgl_pesan.required' => 'Tanggal pesan tidak boleh kosong',
        ]);
        $cari = Transaction::where('car_id', $this->car_id)->where('tgl_pesan', $this->tgl_pesan)
            ->where('status', '!=', 'SELESAI')->count();
        if ($cari == 1) {
            session()->flash('error', 'Mobil sudah dipesan');
        } else {
            Transaction::create([
                'user_id' => auth()->user()->id,
                'car_id' => $this->car_id,
                'nama' => $this->nama,
                'ponsel' => $this->ponsel,
                'lama' => $this->lama,
                'alamat' => $this->alamat,
                'tgl_pesan' => $this->tgl_pesan,
                'total' => $this->total,
                'status' => 'WAIT'
            ]);
            session()->flash('success', 'Transaksi berhasil disimpan');
        }
        $this->dispatch('lihat-transaksi');
        $this->reset();
    }

    public function lihat()
    {
        $this->dataTransaksi['transaksi'] = Transaction::paginate(10);
        $this->lihatPage = true;
    }
}
