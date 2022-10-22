<?php

namespace App\Http\Livewire\Roles;

use App\Models\Role;
use Livewire\Component;

class Index extends Component
{

    public function render()
    {

        $roles = Role::all();

        return view('livewire.roles.index', compact('roles'))
            ->extends('layouts.app')
        ;
    }
}
