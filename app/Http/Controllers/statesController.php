<?php

namespace App\Http\Controllers;

use App\DataTables\statesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatestatesRequest;
use App\Http\Requests\UpdatestatesRequest;
use App\Repositories\statesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\countries;
use Response;

class statesController extends AppBaseController
{
    /** @var  statesRepository */
    private $statesRepository;

    public function __construct(statesRepository $statesRepo)
    {
        $this->statesRepository = $statesRepo;
    }

    /**
     * Display a listing of the states.
     *
     * @param statesDataTable $statesDataTable
     * @return Response
     */
    public function index(statesDataTable $statesDataTable)
    {
        return $statesDataTable->render('states.index');
    }

    /**
     * Show the form for creating a new states.
     *
     * @return Response
     */
    public function create()
    {
        /**get countries List and send them to selection list in blade */
        $listcountries = countries::pluck('name', 'id');
         
        return view('states.create', compact('listcountries'));
    }

    /**
     * Store a newly created states in storage.
     *
     * @param CreatestatesRequest $request
     *
     * @return Response
     */
    public function store(CreatestatesRequest $request)
    {
        $input = $request->all();

        $states = $this->statesRepository->create($input);

        Flash::success('States saved successfully.');

        return redirect(route('states.index'));
    }

    /**
     * Display the specified states.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $states = $this->statesRepository->find($id);

        if (empty($states)) {
            Flash::error('States not found');

            return redirect(route('states.index'));
        }

        return view('states.show')->with('states', $states);
    }

    /**
     * Show the form for editing the specified states.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $states = $this->statesRepository->find($id);

        if (empty($states)) {
            Flash::error('States not found');

            return redirect(route('states.index'));
        }
        /**get countries List and send them to selection list in blade */
        $listcountries = countries::pluck('name', 'id');
         
        return view('states.edit', compact('states','listcountries'));
        
    }

    /**
     * Update the specified states in storage.
     *
     * @param  int              $id
     * @param UpdatestatesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestatesRequest $request)
    {
        $states = $this->statesRepository->find($id);

        if (empty($states)) {
            Flash::error('States not found');

            return redirect(route('states.index'));
        }

        $states = $this->statesRepository->update($request->all(), $id);

        Flash::success('States updated successfully.');

        return redirect()->back();
    }

    /**
     * Remove the specified states from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $states = $this->statesRepository->find($id);

        if (empty($states)) {
            Flash::error('States not found');

            return redirect(route('states.index'));
        }

        $this->statesRepository->delete($id);

        Flash::success('States deleted successfully.');

        return redirect(route('states.index'));
    }
}
