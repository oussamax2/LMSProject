<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatemessagingAPIRequest;
use App\Http\Requests\API\UpdatemessagingAPIRequest;
use App\Models\messaging;
use App\Repositories\messagingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class messagingController
 * @package App\Http\Controllers\API
 */

class messagingAPIController extends AppBaseController
{
    /** @var  messagingRepository */
    private $messagingRepository;

    public function __construct(messagingRepository $messagingRepo)
    {
        $this->messagingRepository = $messagingRepo;
    }

    /**
     * Display a listing of the messaging.
     * GET|HEAD /messagings
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $messagings = $this->messagingRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($messagings->toArray(), 'Messagings retrieved successfully');
    }

    /**
     * Store a newly created messaging in storage.
     * POST /messagings
     *
     * @param CreatemessagingAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatemessagingAPIRequest $request)
    {
        $input = $request->all();

        $messaging = $this->messagingRepository->create($input);

        return $this->sendResponse($messaging->toArray(), 'Messaging saved successfully');
    }

    /**
     * Display the specified messaging.
     * GET|HEAD /messagings/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var messaging $messaging */
        $messaging = $this->messagingRepository->find($id);

        if (empty($messaging)) {
            return $this->sendError('Messaging not found');
        }

        return $this->sendResponse($messaging->toArray(), 'Messaging retrieved successfully');
    }

    /**
     * Update the specified messaging in storage.
     * PUT/PATCH /messagings/{id}
     *
     * @param int $id
     * @param UpdatemessagingAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemessagingAPIRequest $request)
    {
        $input = $request->all();

        /** @var messaging $messaging */
        $messaging = $this->messagingRepository->find($id);

        if (empty($messaging)) {
            return $this->sendError('Messaging not found');
        }

        $messaging = $this->messagingRepository->update($input, $id);

        return $this->sendResponse($messaging->toArray(), 'messaging updated successfully');
    }

    /**
     * Remove the specified messaging from storage.
     * DELETE /messagings/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var messaging $messaging */
        $messaging = $this->messagingRepository->find($id);

        if (empty($messaging)) {
            return $this->sendError('Messaging not found');
        }

        $messaging->delete();

        return $this->sendSuccess('Messaging deleted successfully');
    }
}
