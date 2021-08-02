<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesubscribersAPIRequest;
use App\Http\Requests\API\UpdatesubscribersAPIRequest;
use App\Models\subscribers;
use App\Repositories\subscribersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class subscribersController
 * @package App\Http\Controllers\API
 */

class subscribersAPIController extends AppBaseController
{
    /** @var  subscribersRepository */
    private $subscribersRepository;

    public function __construct(subscribersRepository $subscribersRepo)
    {
        $this->subscribersRepository = $subscribersRepo;
    }

    /**
     * Display a listing of the subscribers.
     * GET|HEAD /subscribers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $subscribers = $this->subscribersRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($subscribers->toArray(), 'Subscribers retrieved successfully');
    }

    /**
     * Store a newly created subscribers in storage.
     * POST /subscribers
     *
     * @param CreatesubscribersAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatesubscribersAPIRequest $request)
    {
        $input = $request->all();

        $subscribers = $this->subscribersRepository->create($input);

        return $this->sendResponse($subscribers->toArray(), 'Subscribers saved successfully');
    }

    /**
     * Display the specified subscribers.
     * GET|HEAD /subscribers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var subscribers $subscribers */
        $subscribers = $this->subscribersRepository->find($id);

        if (empty($subscribers)) {
            return $this->sendError('Subscribers not found');
        }

        return $this->sendResponse($subscribers->toArray(), 'Subscribers retrieved successfully');
    }

    /**
     * Update the specified subscribers in storage.
     * PUT/PATCH /subscribers/{id}
     *
     * @param int $id
     * @param UpdatesubscribersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesubscribersAPIRequest $request)
    {
        $input = $request->all();

        /** @var subscribers $subscribers */
        $subscribers = $this->subscribersRepository->find($id);

        if (empty($subscribers)) {
            return $this->sendError('Subscribers not found');
        }

        $subscribers = $this->subscribersRepository->update($input, $id);

        return $this->sendResponse($subscribers->toArray(), 'subscribers updated successfully');
    }

    /**
     * Remove the specified subscribers from storage.
     * DELETE /subscribers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var subscribers $subscribers */
        $subscribers = $this->subscribersRepository->find($id);

        if (empty($subscribers)) {
            return $this->sendError('Subscribers not found');
        }

        $subscribers->delete();

        return $this->sendSuccess('Subscribers deleted successfully');
    }
}
