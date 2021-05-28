<?php

namespace App\Http\Controllers;

use App\DataTables\target_audianceDataTable;
use App\Http\Requests;
use App\Http\Requests\Createtarget_audianceRequest;
use App\Http\Requests\Updatetarget_audianceRequest;
use App\Repositories\target_audianceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class target_audianceController extends AppBaseController
{
    /** @var  target_audianceRepository */
    private $targetAudianceRepository;

    public function __construct(target_audianceRepository $targetAudianceRepo)
    {
        $this->targetAudianceRepository = $targetAudianceRepo;
    }

    /**
     * Display a listing of the target_audiance.
     *
     * @param target_audianceDataTable $targetAudianceDataTable
     * @return Response
     */
    public function index(target_audianceDataTable $targetAudianceDataTable)
    {
        return $targetAudianceDataTable->render('target_audiances.index');
    }

    /**
     * Show the form for creating a new target_audiance.
     *
     * @return Response
     */
    public function create()
    {
        return view('target_audiances.create');
    }

    /**
     * Store a newly created target_audiance in storage.
     *
     * @param Createtarget_audianceRequest $request
     *
     * @return Response
     */
    public function store(Createtarget_audianceRequest $request)
    {
        $input = $request->all();

        $targetAudiance = $this->targetAudianceRepository->create($input);

        Flash::success('Target Audiance saved successfully.');

        return redirect(route('targetAudiances.index'));
    }

    /**
     * Display the specified target_audiance.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $targetAudiance = $this->targetAudianceRepository->find($id);

        if (empty($targetAudiance)) {
            Flash::error('Target Audiance not found');

            return redirect(route('targetAudiances.index'));
        }

        return view('target_audiances.show')->with('targetAudiance', $targetAudiance);
    }

    /**
     * Show the form for editing the specified target_audiance.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $targetAudiance = $this->targetAudianceRepository->find($id);

        if (empty($targetAudiance)) {
            Flash::error('Target Audiance not found');

            return redirect(route('targetAudiances.index'));
        }

        return view('target_audiances.edit')->with('targetAudiance', $targetAudiance);
    }

    /**
     * Update the specified target_audiance in storage.
     *
     * @param  int              $id
     * @param Updatetarget_audianceRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetarget_audianceRequest $request)
    {
        $targetAudiance = $this->targetAudianceRepository->find($id);

        if (empty($targetAudiance)) {
            Flash::error('Target Audiance not found');

            return redirect(route('targetAudiances.index'));
        }

        $targetAudiance = $this->targetAudianceRepository->update($request->all(), $id);

        Flash::success('Target Audiance updated successfully.');

        return redirect(route('targetAudiances.index'));
    }

    /**
     * Remove the specified target_audiance from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $targetAudiance = $this->targetAudianceRepository->find($id);

        if (empty($targetAudiance)) {
            Flash::error('Target Audiance not found');

            return redirect(route('targetAudiances.index'));
        }

        $this->targetAudianceRepository->delete($id);

        Flash::success('Target Audiance deleted successfully.');

        return redirect(route('targetAudiances.index'));
    }
}
