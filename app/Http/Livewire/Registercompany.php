<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Hash;
use App\Models\User;
use App\Models\companies;
use Illuminate\Http\UploadedFile;
use Livewire\WithFileUploads;
use Auth;
class Registercompany extends Component
{
    use WithFileUploads;
    public $users, $email, $password, $name,$password_confirmation,$shortDescription,
    $fcburl,
    $twitturl,
    $lastname,
    $telephone,
    $website,
    $picture,
    $linkdinurl,
    $description,
    $dribbleurl;

    public function render()
    {
        return view('livewire.registercompany');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->shortDescription = '';
        $this->fcburl = '';
        $this->twitturl = '';
        $this->lastname = '';
        $this->telephone = '';
        $this->website = '';
        $this->linkdinurl = '';
        $this->dribbleurl = '';
        $this->description = '';

    }


    public function savepicture(UploadedFile $file) : string
    {
        return $file->store('companies_pictures', ['disk' => 'public']);
    }


    public function register()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);







        $pass = $this->password;
       $user =   User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user->addRole(['company']);
       // $user->sendEmailVerificationNotification();
        if ($this->picture){

            $image = $this->picture->store('companies_pictures', ['disk' => 'public']);
            $companies = companies::create([
                'user_id' => $user->id,
                'lastname' => $this->lastname,
                'website' => $this->website,
                'telephone' => $this->telephone,
                'shortDescription'	 => $this->shortDescription,
                'description' => $this->description,
                'fcburl' => $this->fcburl,
                'twitturl' => $this->twitturl,
                'linkdinurl' => $this->linkdinurl,
                'dribbleurl' => $this->dribbleurl,
                'status' => 0,
            ]);
            $companies->picture = $image;
            $companies->save();

        }else{


            companies::create([
                'user_id' => $user->id,
                'lastname' => $this->lastname,
                'website' => $this->website,
                'telephone' => $this->telephone,
                'picture' => "",
                'shortDescription'	 => $this->shortDescription,
                'description' => $this->description,
                'fcburl' => $this->fcburl,
                'twitturl' => $this->twitturl,
                'linkdinurl' => $this->linkdinurl,
                'dribbleurl' => $this->dribbleurl,
                'status' => 0,
            ]);

        }
        if(\Auth::attempt(array('email' => $this->email, 'password' => $pass))){
            session()->flash('message', "You are Login successful.");
            redirect('/dashboarduser');
    }
       $this->resetInputFields();

    }
}
