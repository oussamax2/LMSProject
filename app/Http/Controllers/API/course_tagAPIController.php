<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createcourse_tagAPIRequest;
use App\Http\Requests\API\Updatecourse_tagAPIRequest;
use App\Models\course_tag;
use App\Repositories\course_tagRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class course_tagController
 * @package App\Http\Controllers\API
 */

class course_tagAPIController extends AppBaseController
{
    /** @var  course_tagRepository */
    private $courseTagRepository;

    public function __construct(course_tagRepository $courseTagRepo)
    {
        $this->courseTagRepository = $courseTagRepo;
    }

    /**
     * Display a listing of the course_tag.
     * GET|HEAD /courseTags
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $courseTags = $this->courseTagRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($courseTags->toArray(), 'Course Tags retrieved successfully');
    }

    /**
     * Store a newly created course_tag in storage.
     * POST /courseTags
     *
     * @param Createcourse_tagAPIRequest $request
     *
     * @return Response
     */
    public function store(Createcourse_tagAPIRequest $request)
    {
        $input = $request->all();

        $courseTag = $this->courseTagRepository->create($input);

        return $this->sendResponse($courseTag->toArray(), 'Course Tag saved successfully');
    }

    /**
     * Display the specified course_tag.
     * GET|HEAD /courseTags/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var course_tag $courseTag */
        $courseTag = $this->courseTagRepository->find($id);

        if (empty($courseTag)) {
            return $this->sendError('Course Tag not found');
        }

        return $this->sendResponse($courseTag->toArray(), 'Course Tag retrieved successfully');
    }

    /**
     * Update the specified course_tag in storage.
     * PUT/PATCH /courseTags/{id}
     *
     * @param int $id
     * @param Updatecourse_tagAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatecourse_tagAPIRequest $request)
    {
        $input = $request->all();

        /** @var course_tag $courseTag */
        $courseTag = $this->courseTagRepository->find($id);

        if (empty($courseTag)) {
            return $this->sendError('Course Tag not found');
        }

        $courseTag = $this->courseTagRepository->update($input, $id);

        return $this->sendResponse($courseTag->toArray(), 'course_tag updated successfully');
    }

    /**
     * Remove the specified course_tag from storage.
     * DELETE /courseTags/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var course_tag $courseTag */
        $courseTag = $this->courseTagRepository->find($id);

        if (empty($courseTag)) {
            return $this->sendError('Course Tag not found');
        }

        $courseTag->delete();

        return $this->sendSuccess('Course Tag deleted successfully');
    }
}
