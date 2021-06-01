<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Hash;
use Auth;
use App\Models\User;

class Registeruser extends Component
{
    public $users, $email, $password, $name,$password_confirmation;

    public function render()
    {
        return view('livewire.registeruser');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
    }



    public function registerUser()
    {
        $validatedDate = $this->validate([
            'name' => 'required|max:25',
            'email' => 'required|email|max:25|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);
        $pass = $this->password;
        $this->password = Hash::make($this->password);
        $user = User::create(['name' => $this->name, 'email' => $this->email,'password' => $this->password]);
        $user->addRole(['user']);
        $user->sendEmailVerificationNotification();

        if(\Auth::attempt(array('email' => $this->email, 'password' => $pass))){
            session()->flash('message', "You are Login successful.");
            redirect('/dashboarduser');
    }



        $this->resetInputFields();

    }
}
