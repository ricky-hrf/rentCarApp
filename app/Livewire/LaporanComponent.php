<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class LaporanComponent extends Component
{
    use WithoutUrlPagination, WithPagination;
    public function render()
    {
        $data['transaksi'] = Transaction::where('status', 'SELESAI')->paginate(10);
        return view('livewire.laporan-component', $data);
    }
}
