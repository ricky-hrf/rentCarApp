<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Features\SupportPagination\WithoutUrlPagination;

class LaporanComponent extends Component
{
    use WithoutUrlPagination, WithPagination;
    public $tanggal1, $tanggal2;
    #[On('lihat-laporan')]
    public function render()
    {
        if ($this->tanggal2 != "") {
            $data['transaksi'] = Transaction::where('status', 'SELESAI')->whereBetween('tgl_pesan', [$this->tanggal1, $this->tanggal2])->paginate(10);
        } else {
            $data['transaksi'] = Transaction::where('status', 'SELESAI')->paginate(10);
        }

        return view('livewire.laporan-component', $data);
    }

    public function cari()
    {
        $this->dispatch('lihat-laporan');
    }

    public function exportpdf()
    {
        if ($this->tanggal2 != "") {
            $data['transaksi'] = Transaction::where('status', 'SELESAI')->whereBetween('tgl_pesan', [$this->tanggal1, $this->tanggal2])->get();
            $pdf = Pdf::loadView('laporan.export', $data)->output();
            return response()->streamDownload(
                fn() => print($pdf),
                "laporan-transaksi" . $this->tanggal1 . '-' . $this->tanggal2 . ".pdf"
            );
        } else {
            $data['transaksi'] = Transaction::where('status', 'SELESAI')->get();
            $pdf = Pdf::loadView('laporan.export', $data)->output();
            return response()->streamDownload(
                fn() => print($pdf),
                "laporan-transaksi.pdf"
            );
        }
    }
}
