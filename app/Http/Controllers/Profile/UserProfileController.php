<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\UploadedFile;

class UserProfileController extends Controller
{

    function edit(){

    	$id = auth()->user()->id;

		$user = User::find($id);

        return view('profile.edit')->with('user', $user);

    }
    public function saveprofilepicture(UploadedFile $file) : string
    {
        return $file->store('profile_pictures', ['disk' => 'public']);
    }

    function update(Request $request){

        $id = auth()->user()->id;

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            // 'telephone' => 'required',

        ]);

		$user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('password') && $request->input('password') != '') {

            $this->validate($request, ['password' => 'string|min:6|confirmed']);
    	    $user->password = bcrypt($request->password);
        }

        $user->companies->telephone = $request->telephone;
        $user->companies->website = $request->website;
        $user->companies->shortDescription = $request->shortDescription;
        $user->companies->description = $request->description;
        $user->companies->fcburl = $request->fcburl;
        $user->companies->twitturl = $request->twitturl;
        $user->companies->linkdinurl = $request->linkdinurl;
        $user->companies->dribbleurl = $request->dribbleurl;

    	$user->update();
        $user->companies->update();
        
        if ($request->has('picture')){
            $this->validate($request, ['picture' => 'file|max:2048']);
            /**save image in intended folder */
            $image = $this->saveprofilepicture($request->file('picture'));
            /**save image in database column */
            $user->companies->picture = $image;
            $user->companies->save();
        }
        


    	return redirect()->back();
    }
}
