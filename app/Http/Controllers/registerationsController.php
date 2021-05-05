<?php

namespace App\Http\Controllers;

use App\DataTables\registerationsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateregisterationsRequest;
use App\Http\Requests\UpdateregisterationsRequest;
use App\Repositories\registerationsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
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

        if (empty($registerations)) {
            Flash::error('Registerations not found');

            return redirect(route('registerations.index'));
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
    public function edit($id)
    {
        $registerations = $this->registerationsRepository->find($id);

        if (empty($registerations)) {
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
    public function update($id, UpdateregisterationsRequest $request)
    {
        $registerations = $this->registerationsRepository->find($id);

        if (empty($registerations)) {
            Flash::error('Registerations not found');

            return redirect(route('registerations.index'));
        }

        $registerations = $this->registerationsRepository->update($request->all(), $id);

        Flash::success('Registerations updated successfully.');

        return redirect(route('registerations.index'));
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

        if (empty($registerations)) {
            Flash::error('Registerations not found');

            return redirect(route('registerations.index'));
        }

        $this->registerationsRepository->delete($id);

        Flash::success('Registerations deleted successfully.');

        return redirect(route('registerations.index'));
    }
}
