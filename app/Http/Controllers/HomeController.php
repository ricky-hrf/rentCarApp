<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['mobil'] = Car::count();
        $data['user'] = User::count();
        $data['transaksi'] = Transaction::where('status', 'SELESAI')->sum('total');
        return view('home', $data);
    }
}
