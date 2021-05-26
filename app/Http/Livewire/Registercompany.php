<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Hash;
use App\Models\User;

class Registercompany extends Component
{
    public $users, $email, $password, $name,$password_confirmation;

    public function render()
    {
        return view('livewire.registercompany');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function login()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(\Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
                session()->flash('message', "You are Login successful.");
                redirect('/');
        }else{
            session()->flash('error', 'Email and password are wrong.');
        }
    }



    public function registerStore()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);

        $this->password = Hash::make($this->password);

        User::create(['name' => $this->name, 'email' => $this->email,'password' => $this->password]);

        session()->flash('message', 'Your register successfully Go to the login page.');
        redirect('/');
        $this->resetInputFields();

    }
}
