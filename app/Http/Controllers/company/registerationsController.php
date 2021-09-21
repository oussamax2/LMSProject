<?php

namespace App\Http\Controllers\company;

use App\DataTables\registerationsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateregisterationsRequest;
use App\Http\Requests\UpdateregisterationsRequest;
use App\Repositories\registerationsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Mailsender;

class registerationsController extends AppBaseController
{
    /** @var  registerationsRepository */
    private $registerationsRepository;

    public function __construct(registerationsRepository $registerationsRepo)
    {
        $this->registerationsRepository = $registerationsRepo;
    }

    /**
     * Display a listing of the registerations.
     *
     * @param registerationsDataTable $registerationsDataTable
     * @return Response
     */
    public function index(registerationsDataTable $registerationsDataTable)
    {
        return $registerationsDataTable->render('registerations.index');
    }

    /**
     * Show the form for creating a new registerations.
     *
     * @return Response
     */
    public function create()
    {
        return view('registerations.create');
    }

    /**pregisterations
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

        return redirect(route('registerations.index'));
    }

    /**
     * Display the specified registerations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $registerations = $this->registerationsRepository->find($id);

        if (empty($registerations)  || !$registerations->my()) {
            Flash::error('Registerations not found');

            return redirect(route('registerations.index'));
        }
        if(auth()->user()->hasRole('company')){
            $registerations->notifcompany=0;
            $registerations->save();
        }
        return view('registerations.show')->with('registerations', $registerations);
    }

    /**
     * Show the form for editing the specified registerations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function editx($id)
    {
        $registerations = $this->registerationsRepository->find($id);

        if (empty($registerations)   || !$registerations->my()) {
            Flash::error('Registerations not found');

            return redirect(route('registerations.index'));
        }

        return view('registerations.edit')->with('registerations', $registerations);
    }

    /**
     * Update the specified registerations in storage.
     *
     * @param  int              $id
     * @param UpdateregisterationsRequest $request
     *
     * @return Response
     */
    public function updatex($id, UpdateregisterationsRequest $request)
    {
        $registerations = $this->registerationsRepository->find($id);

        if (empty($registerations)) {
            Flash::error('Registerations not found');

            return redirect(route('registerations.index'));
        }

        $registerations = $this->registerationsRepository->update($request->all(), $id);

        Flash::success('Registerations updated successfully.');

        return redirect()->back();
    }

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

        if (empty($registerations)   || $registerations->user_id != auth()->user()->id) {
            Flash::error('Registerations not found');

            return redirect(route('registerations.index'));
        }

        $this->registerationsRepository->delete($id);

        Flash::success('Registerations deleted successfully.');

        return redirect(route('registerations.index'));
    }


        /** update registration_request  status*/
        public function update_registrationStatus($id, $response)
        {
            $registerations = $this->registerationsRepository->find($id);
            $user =$registerations->user_id;

            // || $registerations->sessions->companies->id != auth()->user()->companies->id
            if (empty($registerations) || !$registerations->my() ) {
                Flash::error(__('admin.not found'));

                return redirect(route('registerations.index'));
            }
           /**if company clicked on acceptRequest button=> the registerations'status will be 2 ~ pending-payment user's request */
           if ($response == 2) {

                $registerations->status = 2;
                Mailsender::senduser($user,$id,2);
           /**if company clicked on declineRequest button=> the registerations'status will be 1 ~ rejected user's request */
           } elseif ($response == 1)  {

                $registerations->status = 1;
                Mailsender::senduser($user,$id,1);

           } elseif ($response == 3){
             /**if company clicked on accept after status(pending-payement) button=> the registerations'status will be 3 ~ confirmed user's request */
                $registerations->status = 3;
                Mailsender::senduser($user,$id,3);
           }
        //    elseif ($response == 5){
        //       /** the request of cancel cancelled*/
        //         $registerations->status = $registerations->status;
        //         Mailsender::senduser($user,$id,3);

        //    }
           /**save status in DB */
           $registerations->notif=1;
           $registerations->save();
           Flash::success(__('admin.updated successfully.'));




           if ($response == 4){
             /**if company clicked on accept after status(pending-cancelled) button=> the registerations request cancelled and deleted*/
             // $registerations->deleted_at = Carbon::now();
             Mailsender::senduser($user,$id,4);
             $registerations->delete();

             Flash::success(__('admin.deleted successfully.'));


            }
            return redirect()->back();
        }
}
