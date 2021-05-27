<?php

namespace App\Http\Controllers;

use App\DataTables\registerationsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateregisterationsRequest;
use App\Http\Requests\UpdateregisterationsRequest;
use App\Repositories\registerationsRepository;
use Flash;
use App\Models\registerations;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;

class registerationsController extends AppBaseController
{
    /** @var  registerationsRepository */
    private $registerationsRepository;

    public function __construct(registerationsRepository $registerationsRepo)
    {
        $this->registerationsRepository = $registerationsRepo;
    }

    /**
     * Display a listing of the registerationsuser.
     *
     * @param registerationsDataTable $registerationsDataTable
     * @return Response
     */
    public function index(registerationsDataTable $registerationsDataTable)
    {
        return $registerationsDataTable->render('registerationsuser.index');
    }

    /**
     * Show the form for creating a new registerationsuser.
     *
     * @return Response
     */
    public function create()
    {
        return view('registerationsuser.create');
    }

    /**
     * Store a newly created registerations in storage.
     *
     * @param CreateregisterationsRequest $request
     *
     * @return Response
     */
    public function store(CreateregisterationsRequest $request)
    {
        $input = $request->all();

        $registerations = $this->registerationsRepository->create($input);

        Flash::success('Registerations saved successfully.');

        return redirect(route('registerationsuser.index'));
    }

    /**
     * Display the specified registerationsuser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $registerations = $this->registerationsRepository->find($id);

        if (empty($registerations) || !$registerations->my() ) {
            Flash::error('Registerations not found');

            return redirect(route('registerationsuser.index'));
        }

        return view('registerationsuser.show')->with('registerations', $registerations);
    }

    /**
     * Show the form for editing the specified registerationsuser.
     *
     * @param  int $id
     *
     * @return Response
     */


    /**
     * Remove the specified registerations from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $registerations = $this->registerationsRepository->find($id);

        if (empty($registerations) || !$registerations->my()) {
            Flash::error('Registerations not found');

            return redirect(route('registerationsuser.index'));
        }

        $this->registerationsRepository->delete($id);

        Flash::success('Registerations deleted successfully.');

        return redirect(route('registerationsuser.index'));
    }

    /** update registration_request  status*/
    public function update_registrationStatus($id, $response)
    {
        $registerations = $this->registerationsRepository->find($id);

        if (empty($registerations) || !$registerations->my()) {
            Flash::error(__('admin.not found'));

            return redirect(route('registerationsuser.index'));
        }
       /**if admin clicked on acceptRequest button=> the company'status will be 2 ~ pending-payment user's request */
       if ($response == 2) {

            $registerations->status = 2;
       /**if admin clicked on declineRequest button=> the company'status will be 1 ~ rejected user's request */
       } elseif ($response == 1)  {

            $registerations->status = 1;

       } elseif ($response == 3){
         /**if admin clicked on accept after status(pending-payement) button=> the company'status will be 3 ~ confirmed user's request */
            $registerations->status = 3;
       }
       /**save status in DB */
       $registerations->save();
       Flash::success(__('admin.updated successfully.'));

       return redirect()->back();
    }

    public function userregist()
    {
$r= registerations::find(5);

        return response()->json($r->my());
    }
    /** send registration_request  */
    public function student_registsess(Request $request)
    {
        // $request->session
        // auth()->user()->id;
        $registerations = registerations::firstOrCreate(array(
            'session_id' =>  $request->session,
            'user_id' => auth()->user()->id)
        );
        /**save in DB */
        $registerations->save();


        return redirect()->back();



    }


}
