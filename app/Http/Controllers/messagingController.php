<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatemessagingRequest;
use App\Http\Requests\UpdatemessagingRequest;
use App\Repositories\messagingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class messagingController extends AppBaseController
{
    /** @var  messagingRepository */
    private $messagingRepository;

    public function __construct(messagingRepository $messagingRepo)
    {
        $this->messagingRepository = $messagingRepo;
    }

    /**
     * Display a listing of the messaging.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $messagings = $this->messagingRepository->paginate(10);

        return view('messagings.index')
            ->with('messagings', $messagings);
    }

    /**
     * Show the form for creating a new messaging.
     *
     * @return Response
     */
    public function create()
    {
        return view('messagings.create');
    }

    /**
     * Store a newly created messaging in storage.
     *
     * @param CreatemessagingRequest $request
     *
     * @return Response
     */
    public function store(CreatemessagingRequest $request)
    {
        $input = $request->all();

        $messaging = $this->messagingRepository->create($input);

        Flash::success('Messaging saved successfully.');

        return redirect(route('messagings.index'));
    }

    /**
     * Display the specified messaging.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $messaging = $this->messagingRepository->find($id);

        if (empty($messaging)) {
            Flash::error('Messaging not found');

            return redirect(route('messagings.index'));
        }

        return view('messagings.show')->with('messaging', $messaging);
    }

    /**
     * Show the form for editing the specified messaging.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $messaging = $this->messagingRepository->find($id);

        if (empty($messaging)) {
            Flash::error('Messaging not found');

            return redirect(route('messagings.index'));
        }

        return view('messagings.edit')->with('messaging', $messaging);
    }

    /**
     * Update the specified messaging in storage.
     *
     * @param int $id
     * @param UpdatemessagingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemessagingRequest $request)
    {
        $messaging = $this->messagingRepository->find($id);

        if (empty($messaging)) {
            Flash::error('Messaging not found');

            return redirect(route('messagings.index'));
        }

        $messaging = $this->messagingRepository->update($request->all(), $id);

        Flash::success('Messaging updated successfully.');

        return redirect(route('messagings.index'));
    }

    /**
     * Remove the specified messaging from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $messaging = $this->messagingRepository->find($id);

        if (empty($messaging)) {
            Flash::error('Messaging not found');

            return redirect(route('messagings.index'));
        }

        $this->messagingRepository->delete($id);

        Flash::success('Messaging deleted successfully.');

        return redirect(route('messagings.index'));
    }
}
