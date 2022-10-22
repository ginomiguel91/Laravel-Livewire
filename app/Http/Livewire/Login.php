<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $username, $password;
    public function render()
    {
        return view('livewire.login')
            ->extends('layouts.app')
        ;
    }

    public function mount()
    {

        $this->username = '';
        $this->password = '';
    }

    public function login()
    {
        try {
            $validateUser = $this->validate(
                [
                    'username' => 'required',
                    'password' => 'required',
                ]);

            if (!$validateUser) {
                session()->flash('error', ' validation error.');
            }

            if (!Auth::attempt(['username' => $this->username, 'password' => $this->password])) {
                session()->flash('error', 'username and password are wrong.');

            }

            $user = User::where('username', $this->username)->first();
            if ($user->status == "suspended") {
                session()->flash('error', 'user suspended.');
            }

            return redirect()->intended('admin/dashboard');

        } catch (\Throwable$th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

}
