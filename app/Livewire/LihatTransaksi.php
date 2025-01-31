<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class LihatTransaksi extends Component
{
    use WithPagination, WithoutUrlPagination;
    #[On('lihat-transaksi')]
    public function render()
    {
        $data['transaksi'] = Transaction::paginate(10);
        return view('livewire.lihat-transaksi', $data);
    }

    public function proses($id)
    {
        $transaksi = Transaction::find($id);
        $transaksi->update([
            'status' => 'PROSES'
        ]);
        session()->flash('success', 'Berhasil proses data');
    }

    public function selesai($id)
    {
        $transaksi = Transaction::find($id);
        $transaksi->update([
            'status' => 'SELESAI'
        ]);
        session()->flash('success', 'Berhasil proses data');
    }
}
