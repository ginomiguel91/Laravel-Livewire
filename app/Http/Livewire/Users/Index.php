<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $users = User::all();
        return view('livewire.users.index', compact('users'))
            ->extends('layouts.app');
    }

}
