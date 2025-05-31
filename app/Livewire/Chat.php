<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{
    public $users;
    public $selectedUser;


    public function mount()
    {
        $this->users=User::where("id","!=",Auth::id())->get();
        $this->selectedUser=$this->users->first();
    }

    public function render()
    {
        return view('livewire.chat');
    }

    public function usersAll()
    {
        return User::where("id","!=",Auth::id())->get();
    }

    public function userSelected()
    {
        return User::where("id","!=",Auth::id())->first();
    }
}
