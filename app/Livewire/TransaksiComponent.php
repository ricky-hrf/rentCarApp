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
    public function render()
    {
        $data['mobil'] = Car::paginate(5);
        return view('livewire.transaksi-component', $data);
    }
}
