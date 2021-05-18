<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\companies;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
       $user =   User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->roles()->sync([1,2]) ;

        return $user;
    }

    
    public function savepicture(UploadedFile $file) : string
    {
        return $file->store('companies_pictures', ['disk' => 'public']);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\companies
     */
    protected function registervendor(Request $request)
    {

        $validated = $request->validate([
           
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        // var_dump($request->all());
       $user =   User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->roles()->sync([2]) ;
        if ($request->has('picture')){
         
            $image = $this->savepicture($request->file('picture'));
            $companies = companies::create([
                'user_id' => $user->id,
                'lastname' => $request->lastname,            
                'website' => $request->website,   
                'telephone' => $request->telephone,   
                'shortDescription'	 => $request->shortDescription,   
                'description' => $request->description,   
                'fcburl' => $request->fcburl,   
                'twitturl' => $request->twitturl,   
                'linkdinurl' => $request->linkdinurl,   
                'dribbleurl' => $request->dribbleurl,   
                'status' => 0,   
            ]);
            $companies->picture = $image;
            $companies->save();

        }else{

            
            companies::create([
                'user_id' => $user->id,
                'lastname' => $request->lastname,            
                'website' => $request->website,   
                'telephone' => $request->telephone,   
                'picture' => "",   
                'shortDescription'	 => $request->shortDescription,   
                'description' => $request->description,   
                'fcburl' => $request->fcburl,   
                'twitturl' => $request->twitturl,   
                'linkdinurl' => $request->linkdinurl,   
                'dribbleurl' => $request->dribbleurl,   
                'status' => 0,   
            ]);

        }


        auth()->attempt($request->only('email', 'password'));
        return redirect()->intended('/dashboard');
    }    
}
