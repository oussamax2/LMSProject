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
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function createadmin()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function storeadmin(CreateUserRequest $request)
    {
        $input = $request->all();

       

        $user = $this->userRepository->create($input);
        if ($request->has('password') && $request->input('password') != '') {

            $this->validate($request, ['password' => 'string|min:6']);
            $user->password = bcrypt($request->password);
        }
        $user->addRole(['admin']);
        $user->save();
        Flash::success(__('admin.saved successfully.'));

        return redirect(route('indexadmins'));
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
