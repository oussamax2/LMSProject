<?php

namespace App\Http\Controllers;

use App\DataTables\course_tagDataTable;
use App\Http\Requests;
use App\Http\Requests\Createcourse_tagRequest;
use App\Http\Requests\Updatecourse_tagRequest;
use App\Repositories\course_tagRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class course_tagController extends AppBaseController
{
    /** @var  course_tagRepository */
    private $courseTagRepository;

    public function __construct(course_tagRepository $courseTagRepo)
    {
        $this->courseTagRepository = $courseTagRepo;
    }

    /**
     * Display a listing of the course_tag.
     *
     * @param course_tagDataTable $courseTagDataTable
     * @return Response
     */
    public function index(course_tagDataTable $courseTagDataTable)
    {
        return $courseTagDataTable->render('course_tags.index');
    }

    /**
     * Show the form for creating a new course_tag.
     *
     * @return Response
     */
    public function create()
    {
        return view('course_tags.create');
    }

    /**
     * Store a newly created course_tag in storage.
     *
     * @param Createcourse_tagRequest $request
     *
     * @return Response
     */
    public function store(Createcourse_tagRequest $request)
    {
        $input = $request->all();

        $courseTag = $this->courseTagRepository->create($input);

        Flash::success('Course Tag saved successfully.');

        return redirect(route('courseTags.index'));
    }

    /**
     * Display the specified course_tag.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $courseTag = $this->courseTagRepository->find($id);

        if (empty($courseTag)) {
            Flash::error('Course Tag not found');

            return redirect(route('courseTags.index'));
        }

        return view('course_tags.show')->with('courseTag', $courseTag);
    }

    /**
     * Show the form for editing the specified course_tag.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $courseTag = $this->courseTagRepository->find($id);

        if (empty($courseTag)) {
            Flash::error('Course Tag not found');

            return redirect(route('courseTags.index'));
        }

        return view('course_tags.edit')->with('courseTag', $courseTag);
    }

    /**
     * Update the specified course_tag in storage.
     *
     * @param  int              $id
     * @param Updatecourse_tagRequest $request
     *
     * @return Response
     */
    public function update($id, Updatecourse_tagRequest $request)
    {
        $courseTag = $this->courseTagRepository->find($id);

        if (empty($courseTag)) {
            Flash::error('Course Tag not found');

            return redirect(route('courseTags.index'));
        }

        $courseTag = $this->courseTagRepository->update($request->all(), $id);

        Flash::success('Course Tag updated successfully.');

        return redirect(route('courseTags.index'));
    }

    /**
     * Remove the specified course_tag from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $courseTag = $this->courseTagRepository->find($id);

        if (empty($courseTag)) {
            Flash::error('Course Tag not found');

            return redirect(route('courseTags.index'));
        }

        $this->courseTagRepository->delete($id);

        Flash::success('Course Tag deleted successfully.');

        return redirect(route('courseTags.index'));
    }
}
