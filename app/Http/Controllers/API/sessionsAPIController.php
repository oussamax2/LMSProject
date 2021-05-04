<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesessionsAPIRequest;
use App\Http\Requests\API\UpdatesessionsAPIRequest;
use App\Models\sessions;
use App\Repositories\sessionsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class sessionsController
 * @package App\Http\Controllers\API
 */

class sessionsAPIController extends AppBaseController
{
    /** @var  sessionsRepository */
    private $sessionsRepository;

    public function __construct(sessionsRepository $sessionsRepo)
    {
        $this->sessionsRepository = $sessionsRepo;
    }

    /**
     * Display a listing of the sessions.
     * GET|HEAD /sessions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $sessions = $this->sessionsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sessions->toArray(), 'Sessions retrieved successfully');
    }

    /**
     * Store a newly created sessions in storage.
     * POST /sessions
     *
     * @param CreatesessionsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatesessionsAPIRequest $request)
    {
        $input = $request->all();

        $sessions = $this->sessionsRepository->create($input);

        return $this->sendResponse($sessions->toArray(), 'Sessions saved successfully');
    }

    /**
     * Display the specified sessions.
     * GET|HEAD /sessions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var sessions $sessions */
        $sessions = $this->sessionsRepository->find($id);

        if (empty($sessions)) {
            return $this->sendError('Sessions not found');
        }

        return $this->sendResponse($sessions->toArray(), 'Sessions retrieved successfully');
    }

    /**
     * Update the specified sessions in storage.
     * PUT/PATCH /sessions/{id}
     *
     * @param int $id
     * @param UpdatesessionsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesessionsAPIRequest $request)
    {
        $input = $request->all();

        /** @var sessions $sessions */
        $sessions = $this->sessionsRepository->find($id);

        if (empty($sessions)) {
            return $this->sendError('Sessions not found');
        }

        $sessions = $this->sessionsRepository->update($input, $id);

        return $this->sendResponse($sessions->toArray(), 'sessions updated successfully');
    }

    /**
     * Remove the specified sessions from storage.
     * DELETE /sessions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var sessions $sessions */
        $sessions = $this->sessionsRepository->find($id);

        if (empty($sessions)) {
            return $this->sendError('Sessions not found');
        }

        $sessions->delete();

        return $this->sendSuccess('Sessions deleted successfully');
    }
}
