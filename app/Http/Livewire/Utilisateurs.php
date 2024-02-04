<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;

class Utilisateurs extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $currentPage = PAGELIST;
    public $newUser = [];
    public $editUser = [];
    public $role = [];

    /*public function clickaddUser(){
        //$this->isBtnAddClick = true;
          return redirect()->to('livewire.utilisateurs.adduser');
    }*/

    public function render()
    {
        return view('livewire.utilisateurs.listeuser',[
            "users" => User::paginate(10)
            //'users' => DB::table('users')->orderBy('id')->cursorPaginate(10)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    //public $isBtnAddClick = false;

    public function addUser(){
        return view('livewire.utilisateurs.adduser');
    }
}
