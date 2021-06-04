<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatelanguageAPIRequest;
use App\Http\Requests\API\UpdatelanguageAPIRequest;
use App\Models\language;
use App\Repositories\languageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class languageController
 * @package App\Http\Controllers\API
 */

class languageAPIController extends AppBaseController
{
    /** @var  languageRepository */
    private $languageRepository;

    public function __construct(languageRepository $languageRepo)
    {
        $this->languageRepository = $languageRepo;
    }

    /**
     * Display a listing of the language.
     * GET|HEAD /languages
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $languages = $this->languageRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($languages->toArray(), 'Languages retrieved successfully');
    }

    /**
     * Store a newly created language in storage.
     * POST /languages
     *
     * @param CreatelanguageAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatelanguageAPIRequest $request)
    {
        $input = $request->all();

        $language = $this->languageRepository->create($input);

        return $this->sendResponse($language->toArray(), 'Language saved successfully');
    }

    /**
     * Display the specified language.
     * GET|HEAD /languages/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var language $language */
        $language = $this->languageRepository->find($id);

        if (empty($language)) {
            return $this->sendError('Language not found');
        }

        return $this->sendResponse($language->toArray(), 'Language retrieved successfully');
    }

    /**
     * Update the specified language in storage.
     * PUT/PATCH /languages/{id}
     *
     * @param int $id
     * @param UpdatelanguageAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatelanguageAPIRequest $request)
    {
        $input = $request->all();

        /** @var language $language */
        $language = $this->languageRepository->find($id);

        if (empty($language)) {
            return $this->sendError('Language not found');
        }

        $language = $this->languageRepository->update($input, $id);

        return $this->sendResponse($language->toArray(), 'language updated successfully');
    }

    /**
     * Remove the specified language from storage.
     * DELETE /languages/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var language $language */
        $language = $this->languageRepository->find($id);

        if (empty($language)) {
            return $this->sendError('Language not found');
        }

        $language->delete();

        return $this->sendSuccess('Language deleted successfully');
    }
}
