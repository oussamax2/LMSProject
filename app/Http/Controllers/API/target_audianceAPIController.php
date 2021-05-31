<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtarget_audianceAPIRequest;
use App\Http\Requests\API\Updatetarget_audianceAPIRequest;
use App\Models\target_audiance;
use App\Repositories\target_audianceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class target_audianceController
 * @package App\Http\Controllers\API
 */

class target_audianceAPIController extends AppBaseController
{
    /** @var  target_audianceRepository */
    private $targetAudianceRepository;

    public function __construct(target_audianceRepository $targetAudianceRepo)
    {
        $this->targetAudianceRepository = $targetAudianceRepo;
    }

    /**
     * Display a listing of the target_audiance.
     * GET|HEAD /targetAudiances
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $targetAudiances = $this->targetAudianceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($targetAudiances->toArray(), 'Target Audiances retrieved successfully');
    }

    /**
     * Store a newly created target_audiance in storage.
     * POST /targetAudiances
     *
     * @param Createtarget_audianceAPIRequest $request
     *
     * @return Response
     */
    public function store(Createtarget_audianceAPIRequest $request)
    {
        $input = $request->all();

        $targetAudiance = $this->targetAudianceRepository->create($input);

        return $this->sendResponse($targetAudiance->toArray(), 'Target Audiance saved successfully');
    }

    /**
     * Display the specified target_audiance.
     * GET|HEAD /targetAudiances/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var target_audiance $targetAudiance */
        $targetAudiance = $this->targetAudianceRepository->find($id);

        if (empty($targetAudiance)) {
            return $this->sendError('Target Audiance not found');
        }

        return $this->sendResponse($targetAudiance->toArray(), 'Target Audiance retrieved successfully');
    }

    /**
     * Update the specified target_audiance in storage.
     * PUT/PATCH /targetAudiances/{id}
     *
     * @param int $id
     * @param Updatetarget_audianceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetarget_audianceAPIRequest $request)
    {
        $input = $request->all();

        /** @var target_audiance $targetAudiance */
        $targetAudiance = $this->targetAudianceRepository->find($id);

        if (empty($targetAudiance)) {
            return $this->sendError('Target Audiance not found');
        }

        $targetAudiance = $this->targetAudianceRepository->update($input, $id);

        return $this->sendResponse($targetAudiance->toArray(), 'target_audiance updated successfully');
    }

    /**
     * Remove the specified target_audiance from storage.
     * DELETE /targetAudiances/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var target_audiance $targetAudiance */
        $targetAudiance = $this->targetAudianceRepository->find($id);

        if (empty($targetAudiance)) {
            return $this->sendError('Target Audiance not found');
        }

        $targetAudiance->delete();

        return $this->sendSuccess('Target Audiance deleted successfully');
    }
}
