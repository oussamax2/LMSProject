<?php

namespace App\Http\Controllers;

use App\DataTables\subscribersDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesubscribersRequest;
use App\Http\Requests\UpdatesubscribersRequest;
use App\Repositories\subscribersRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class subscribersController extends AppBaseController
{
    /** @var  subscribersRepository */
    private $subscribersRepository;

    public function __construct(subscribersRepository $subscribersRepo)
    {
        $this->subscribersRepository = $subscribersRepo;
    }

    /**
     * Display a listing of the subscribers.
     *
     * @param subscribersDataTable $subscribersDataTable
     * @return Response
     */
    public function index(subscribersDataTable $subscribersDataTable)
    {
        return $subscribersDataTable->render('subscribers.index');
    }

    /**
     * Show the form for creating a new subscribers.
     *
     * @return Response
     */
    public function create()
    {
        return view('subscribers.create');
    }

    /**
     * Store a newly created subscribers in storage.
     *
     * @param CreatesubscribersRequest $request
     *
     * @return Response
     */
    public function store(CreatesubscribersRequest $request)
    {
        $input = $request->all();

        $subscribers = $this->subscribersRepository->create($input);

        Flash::success(__('admin.saved successfully.'));

        return redirect(route('subscribers.index'));
    }

    /**
     * Display the specified subscribers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subscribers = $this->subscribersRepository->find($id);

        if (empty($subscribers)) {
            Flash::error('Subscribers not found');

            return redirect(route('subscribers.index'));
        }

        return view('subscribers.show')->with('subscribers', $subscribers);
    }




    /**
     * Remove the specified subscribers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subscribers = $this->subscribersRepository->find($id);

        if (empty($subscribers)) {
            Flash::error('Subscribers not found');

            return redirect(route('subscribers.index'));
        }

        $this->subscribersRepository->delete($id);

        Flash::success(__('admin.deleted successfully.'));

        return redirect(route('subscribers.index'));
    }
}
