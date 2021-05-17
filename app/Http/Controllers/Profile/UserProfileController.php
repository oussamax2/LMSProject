<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserProfileController extends Controller
{

    function edit(){

    	$id = auth()->user()->id;

		$user = User::find($id);

        return view('profile.edit')->with('user', $user);

    }

    function update(Request $request){

        $id = auth()->user()->id; 

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
           
        ]);

		$user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('password') && $request->input('password') != '') {

            $this->validate($request, ['password' => 'string|min:6|confirmed']);
    	    $user->password = bcrypt($request->password);
        }
    	$user->update();

    	return redirect()->to('/admin');    
    }
}
