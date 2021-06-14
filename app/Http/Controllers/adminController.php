<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Response;

class adminController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    public function indexadmins()
    {
       /**get users with role "admin" ~~ admin_list */
        $admin = User::whereHas('roles', function ($query) {
            $query->where('name','admin');
        })->paginate(10);

        // var_dump($admin);
        return view('admin.index')
            ->with('admin', $admin);
    }
 


    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function showadmins($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('admin not found');

            return redirect(route('indexadmins'));
        }

        return view('admin.show')->with('user', $user);
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroyadmins($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('admin not found');

            return redirect(route('indexadmins'));
        }
               
        $this->userRepository->delete($id);

        Flash::success(__('forms.deleted successfully.'));

        return redirect(route('indexadmins'));
    }
}
