<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class UsersComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $addPage = false;
    public $nama, $email, $password, $role;
    public function render()
    {
        $data['user'] = User::paginate(5);
        return view('livewire.users-component', $data);
    }
    public function create()
    {
        $this->addPage = true;
    }
    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ], [
            'nama.required' => 'nama tidak boleh kosong',
            'email.required' => 'email tidak boleh kosong',
            'email.email' => 'format email salah',
            'password.required' => 'password tidak boleh kosong',
            'role.required' => 'role tidak boleh kosong'
        ]);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role
        ]);
        session()->flash('success', 'data berhasil disimpan');
        $this->reset();
    }
}
