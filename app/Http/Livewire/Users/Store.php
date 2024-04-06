<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Store extends Component
{

    public $name, $last_name, $username, $email, $password, $status, $dni;
    public function render()
    {
        return view('livewire.users.store')
            ->extends('layouts.app');

    }

    public function addUser()
    {
        $validateUser = $this->validate(
            [
                'username' => 'required',
                'last_name' => 'required',
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',
                'status' => 'required',
                'dni' => 'required',
            ]);

        try {

            if (!$validateUser) {
                session()->flash('error', ' validation error.');
            }
            User::create([
                'name' => $this->name,
                'last_name' => $this->last_name,
                'username' => $this->username,
                'email' => $this->email,
                'password' => $this->password,
                'status' => $this->status,
                'dni' => $this->dni,

            ]);
            return redirect()->intended('users/index');
        } catch (\Throwable$th) {

            session()->flash('error', $th->getMessage());
        }
    }

    public function cancel()
    {
        return redirect()->intended('users/index');
    }

}
