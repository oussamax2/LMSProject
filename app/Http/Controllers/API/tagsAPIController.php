<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetagsAPIRequest;
use App\Http\Requests\API\UpdatetagsAPIRequest;
use App\Models\tags;
use App\Repositories\tagsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tagsController
 * @package App\Http\Controllers\API
 */

class tagsAPIController extends AppBaseController
{
    /** @var  tagsRepository */
    private $tagsRepository;

    public function __construct(tagsRepository $tagsRepo)
    {
        $this->tagsRepository = $tagsRepo;
    }

    /**
     * Display a listing of the tags.
     * GET|HEAD /tags
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tags = $this->tagsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tags->toArray(), 'Tags retrieved successfully');
    }

    /**
     * Store a newly created tags in storage.
     * POST /tags
     *
     * @param CreatetagsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetagsAPIRequest $request)
    {
        $input = $request->all();

        $tags = $this->tagsRepository->create($input);

        return $this->sendResponse($tags->toArray(), 'Tags saved successfully');
    }

    /**
     * Display the specified tags.
     * GET|HEAD /tags/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tags $tags */
        $tags = $this->tagsRepository->find($id);

        if (empty($tags)) {
            return $this->sendError('Tags not found');
        }

        return $this->sendResponse($tags->toArray(), 'Tags retrieved successfully');
    }

    /**
     * Update the specified tags in storage.
     * PUT/PATCH /tags/{id}
     *
     * @param int $id
     * @param UpdatetagsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetagsAPIRequest $request)
    {
        $input = $request->all();

        /** @var tags $tags */
        $tags = $this->tagsRepository->find($id);

        if (empty($tags)) {
            return $this->sendError('Tags not found');
        }

        $tags = $this->tagsRepository->update($input, $id);

        return $this->sendResponse($tags->toArray(), 'tags updated successfully');
    }

    /**
     * Remove the specified tags from storage.
     * DELETE /tags/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tags $tags */
        $tags = $this->tagsRepository->find($id);

        if (empty($tags)) {
            return $this->sendError('Tags not found');
        }

        $tags->delete();

        return $this->sendSuccess('Tags deleted successfully');
    }
}
