<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetagAPIRequest;
use App\Http\Requests\API\UpdatetagAPIRequest;
use App\Models\tag;
use App\Repositories\tagRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tagController
 * @package App\Http\Controllers\API
 */

class tagAPIController extends AppBaseController
{
    /** @var  tagRepository */
    private $tagRepository;

    public function __construct(tagRepository $tagRepo)
    {
        $this->tagRepository = $tagRepo;
    }

    /**
     * Display a listing of the tag.
     * GET|HEAD /tags
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tags = $this->tagRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tags->toArray(), 'Tags retrieved successfully');
    }

    /**
     * Store a newly created tag in storage.
     * POST /tags
     *
     * @param CreatetagAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetagAPIRequest $request)
    {
        $input = $request->all();

        $tag = $this->tagRepository->create($input);

        return $this->sendResponse($tag->toArray(), 'Tag saved successfully');
    }

    /**
     * Display the specified tag.
     * GET|HEAD /tags/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tag $tag */
        $tag = $this->tagRepository->find($id);

        if (empty($tag)) {
            return $this->sendError('Tag not found');
        }

        return $this->sendResponse($tag->toArray(), 'Tag retrieved successfully');
    }

    /**
     * Update the specified tag in storage.
     * PUT/PATCH /tags/{id}
     *
     * @param int $id
     * @param UpdatetagAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetagAPIRequest $request)
    {
        $input = $request->all();

        /** @var tag $tag */
        $tag = $this->tagRepository->find($id);

        if (empty($tag)) {
            return $this->sendError('Tag not found');
        }

        $tag = $this->tagRepository->update($input, $id);

        return $this->sendResponse($tag->toArray(), 'tag updated successfully');
    }

    /**
     * Remove the specified tag from storage.
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
        /** @var tag $tag */
        $tag = $this->tagRepository->find($id);

        if (empty($tag)) {
            return $this->sendError('Tag not found');
        }

        $tag->delete();

        return $this->sendSuccess('Tag deleted successfully');
    }
}
