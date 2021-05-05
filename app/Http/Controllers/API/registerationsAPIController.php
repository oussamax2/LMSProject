<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateregisterationsAPIRequest;
use App\Http\Requests\API\UpdateregisterationsAPIRequest;
use App\Models\registerations;
use App\Repositories\registerationsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class registerationsController
 * @package App\Http\Controllers\API
 */

class registerationsAPIController extends AppBaseController
{
    /** @var  registerationsRepository */
    private $registerationsRepository;

    public function __construct(registerationsRepository $registerationsRepo)
    {
        $this->registerationsRepository = $registerationsRepo;
    }

    /**
     * Display a listing of the registerations.
     * GET|HEAD /registerations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $registerations = $this->registerationsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($registerations->toArray(), 'Registerations retrieved successfully');
    }

    /**
     * Store a newly created registerations in storage.
     * POST /registerations
     *
     * @param CreateregisterationsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateregisterationsAPIRequest $request)
    {
        $input = $request->all();

        $registerations = $this->registerationsRepository->create($input);

        return $this->sendResponse($registerations->toArray(), 'Registerations saved successfully');
    }

    /**
     * Display the specified registerations.
     * GET|HEAD /registerations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var registerations $registerations */
        $registerations = $this->registerationsRepository->find($id);

        if (empty($registerations)) {
            return $this->sendError('Registerations not found');
        }

        return $this->sendResponse($registerations->toArray(), 'Registerations retrieved successfully');
    }

    /**
     * Update the specified registerations in storage.
     * PUT/PATCH /registerations/{id}
     *
     * @param int $id
     * @param UpdateregisterationsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateregisterationsAPIRequest $request)
    {
        $input = $request->all();

        /** @var registerations $registerations */
        $registerations = $this->registerationsRepository->find($id);

        if (empty($registerations)) {
            return $this->sendError('Registerations not found');
        }

        $registerations = $this->registerationsRepository->update($input, $id);

        return $this->sendResponse($registerations->toArray(), 'registerations updated successfully');
    }

    /**
     * Remove the specified registerations from storage.
     * DELETE /registerations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var registerations $registerations */
        $registerations = $this->registerationsRepository->find($id);

        if (empty($registerations)) {
            return $this->sendError('Registerations not found');
        }

        $registerations->delete();

        return $this->sendSuccess('Registerations deleted successfully');
    }
}
