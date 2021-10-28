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

    function crop(Request $request){

        $file = $request->file('picture');
        $new_image_name = 'UIMG'.date('Ymd').uniqid().'.jpg';
        $upload = $file->move(public_path('storage/companies_pictures'), $new_image_name);


        if($upload){
        if(auth()->user()){
            $id = auth()->user()->id;
            $user = User::find($id);
            $user->companies->picture = 'companies_pictures/'.$new_image_name;
            $user->companies->save();
            toastr()->success('Image has been cropped successfully.!');
            }

            return response()->json(['status'=>1, 'msg'=>'companies_pictures/'.$new_image_name]);
        }else{
              return response()->json(['status'=>0, 'msg'=>0]);
        }
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
if( auth()->user()->hasRole('company'))
{
        $user->companies->telephone = $request->telephone;
        $user->companies->website = $request->website;
        $user->companies->shortDescription = $request->shortDescription;
        $user->companies->description = $request->description;
        $user->companies->fcburl = $request->fcburl;
        $user->companies->twitturl = $request->twitturl;
        $user->companies->linkdinurl = $request->linkdinurl;
        $user->companies->dribbleurl = $request->dribbleurl;
        $user->companies->update();
    }
    	$user->update();
        if(array_key_exists('email',$user->getChanges())){
            $user->email_verified_at = NULL;
            $user->update();
        }

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


    function updatesettings(Request $request){

        $id = auth()->user()->id;

        $this->validate($request, [
            'cancelpd' => 'required',
            'canceltrm' => 'required',
            'paymenttrm' => 'required',

            'generaltrm' => 'required',
        ]);

		$user = User::find($id);

        if( auth()->user()->hasRole('company'))
        {
            $user->companies->cancelpd = $request->cancelpd;
            $user->companies->canceltrm = $request->canceltrm;
            $user->companies->paymenttrm = $request->paymenttrm;
            $user->companies->generaltrm = $request->generaltrm;

            $user->companies->update();
        }
    	$user->update();



    	return redirect()->back();
    }
}
