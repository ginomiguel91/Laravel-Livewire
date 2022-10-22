<?php

namespace App\Http\Livewire\Roles;

use App\Models\Role;
use Livewire\Component;

class Store extends Component
{

    public $name;
    public function render()
    {
        return view('livewire.roles.store')
            ->extends('layouts.app');
    }

    public function addRole()
    {

        $this->validate([
            'name' => 'required',
        ]
        );

        Role::create([
            'name' => $this->name,

        ]);

        return redirect()->intended('roles/index');

    }

}
