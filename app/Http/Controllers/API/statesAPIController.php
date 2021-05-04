<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatestatesAPIRequest;
use App\Http\Requests\API\UpdatestatesAPIRequest;
use App\Models\states;
use App\Repositories\statesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class statesController
 * @package App\Http\Controllers\API
 */

class statesAPIController extends AppBaseController
{
    /** @var  statesRepository */
    private $statesRepository;

    public function __construct(statesRepository $statesRepo)
    {
        $this->statesRepository = $statesRepo;
    }

    /**
     * Display a listing of the states.
     * GET|HEAD /states
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $states = $this->statesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($states->toArray(), 'States retrieved successfully');
    }

    /**
     * Store a newly created states in storage.
     * POST /states
     *
     * @param CreatestatesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatestatesAPIRequest $request)
    {
        $input = $request->all();

        $states = $this->statesRepository->create($input);

        return $this->sendResponse($states->toArray(), 'States saved successfully');
    }

    /**
     * Display the specified states.
     * GET|HEAD /states/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var states $states */
        $states = $this->statesRepository->find($id);

        if (empty($states)) {
            return $this->sendError('States not found');
        }

        return $this->sendResponse($states->toArray(), 'States retrieved successfully');
    }

    /**
     * Update the specified states in storage.
     * PUT/PATCH /states/{id}
     *
     * @param int $id
     * @param UpdatestatesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestatesAPIRequest $request)
    {
        $input = $request->all();

        /** @var states $states */
        $states = $this->statesRepository->find($id);

        if (empty($states)) {
            return $this->sendError('States not found');
        }

        $states = $this->statesRepository->update($input, $id);

        return $this->sendResponse($states->toArray(), 'states updated successfully');
    }

    /**
     * Remove the specified states from storage.
     * DELETE /states/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var states $states */
        $states = $this->statesRepository->find($id);

        if (empty($states)) {
            return $this->sendError('States not found');
        }

        $states->delete();

        return $this->sendSuccess('States deleted successfully');
    }
}
