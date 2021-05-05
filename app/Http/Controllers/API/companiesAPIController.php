<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecompaniesAPIRequest;
use App\Http\Requests\API\UpdatecompaniesAPIRequest;
use App\Models\companies;
use App\Repositories\companiesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class companiesController
 * @package App\Http\Controllers\API
 */

class companiesAPIController extends AppBaseController
{
    /** @var  companiesRepository */
    private $companiesRepository;

    public function __construct(companiesRepository $companiesRepo)
    {
        $this->companiesRepository = $companiesRepo;
    }

    /**
     * Display a listing of the companies.
     * GET|HEAD /companies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $companies = $this->companiesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($companies->toArray(), 'Companies retrieved successfully');
    }

    /**
     * Store a newly created companies in storage.
     * POST /companies
     *
     * @param CreatecompaniesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatecompaniesAPIRequest $request)
    {
        $input = $request->all();

        $companies = $this->companiesRepository->create($input);

        return $this->sendResponse($companies->toArray(), 'Companies saved successfully');
    }

    /**
     * Display the specified companies.
     * GET|HEAD /companies/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var companies $companies */
        $companies = $this->companiesRepository->find($id);

        if (empty($companies)) {
            return $this->sendError('Companies not found');
        }

        return $this->sendResponse($companies->toArray(), 'Companies retrieved successfully');
    }

    /**
     * Update the specified companies in storage.
     * PUT/PATCH /companies/{id}
     *
     * @param int $id
     * @param UpdatecompaniesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecompaniesAPIRequest $request)
    {
        $input = $request->all();

        /** @var companies $companies */
        $companies = $this->companiesRepository->find($id);

        if (empty($companies)) {
            return $this->sendError('Companies not found');
        }

        $companies = $this->companiesRepository->update($input, $id);

        return $this->sendResponse($companies->toArray(), 'companies updated successfully');
    }

    /**
     * Remove the specified companies from storage.
     * DELETE /companies/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var companies $companies */
        $companies = $this->companiesRepository->find($id);

        if (empty($companies)) {
            return $this->sendError('Companies not found');
        }

        $companies->delete();

        return $this->sendSuccess('Companies deleted successfully');
    }
}
