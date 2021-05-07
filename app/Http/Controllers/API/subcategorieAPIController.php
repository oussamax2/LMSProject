<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesubcategorieAPIRequest;
use App\Http\Requests\API\UpdatesubcategorieAPIRequest;
use App\Models\subcategorie;
use App\Repositories\subcategorieRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class subcategorieController
 * @package App\Http\Controllers\API
 */

class subcategorieAPIController extends AppBaseController
{
    /** @var  subcategorieRepository */
    private $subcategorieRepository;

    public function __construct(subcategorieRepository $subcategorieRepo)
    {
        $this->subcategorieRepository = $subcategorieRepo;
    }

    /**
     * Display a listing of the subcategorie.
     * GET|HEAD /subcategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $subcategories = $this->subcategorieRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($subcategories->toArray(), 'Subcategories retrieved successfully');
    }

    /**
     * Store a newly created subcategorie in storage.
     * POST /subcategories
     *
     * @param CreatesubcategorieAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatesubcategorieAPIRequest $request)
    {
        $input = $request->all();

        $subcategorie = $this->subcategorieRepository->create($input);

        return $this->sendResponse($subcategorie->toArray(), 'Subcategorie saved successfully');
    }

    /**
     * Display the specified subcategorie.
     * GET|HEAD /subcategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var subcategorie $subcategorie */
        $subcategorie = $this->subcategorieRepository->find($id);

        if (empty($subcategorie)) {
            return $this->sendError('Subcategorie not found');
        }

        return $this->sendResponse($subcategorie->toArray(), 'Subcategorie retrieved successfully');
    }

    /**
     * Update the specified subcategorie in storage.
     * PUT/PATCH /subcategories/{id}
     *
     * @param int $id
     * @param UpdatesubcategorieAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesubcategorieAPIRequest $request)
    {
        $input = $request->all();

        /** @var subcategorie $subcategorie */
        $subcategorie = $this->subcategorieRepository->find($id);

        if (empty($subcategorie)) {
            return $this->sendError('Subcategorie not found');
        }

        $subcategorie = $this->subcategorieRepository->update($input, $id);

        return $this->sendResponse($subcategorie->toArray(), 'subcategorie updated successfully');
    }

    /**
     * Remove the specified subcategorie from storage.
     * DELETE /subcategories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var subcategorie $subcategorie */
        $subcategorie = $this->subcategorieRepository->find($id);

        if (empty($subcategorie)) {
            return $this->sendError('Subcategorie not found');
        }

        $subcategorie->delete();

        return $this->sendSuccess('Subcategorie deleted successfully');
    }
}
