<?php

namespace App\Http\Controllers;

use App\DataTables\tagsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatetagsRequest;
use App\Http\Requests\UpdatetagsRequest;
use App\Repositories\tagsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class tagsController extends AppBaseController
{
    /** @var  tagsRepository */
    private $tagsRepository;

    public function __construct(tagsRepository $tagsRepo)
    {
        $this->tagsRepository = $tagsRepo;
    }

    /**
     * Display a listing of the tags.
     *
     * @param tagsDataTable $tagsDataTable
     * @return Response
     */
    public function index(tagsDataTable $tagsDataTable)
    {
        return $tagsDataTable->render('tags.index');
    }

    /**
     * Show the form for creating a new tags.
     *
     * @return Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created tags in storage.
     *
     * @param CreatetagsRequest $request
     *
     * @return Response
     */
    public function store(CreatetagsRequest $request)
    {
        $input = $request->all();

        $tags = $this->tagsRepository->create($input);

        Flash::success('Tags saved successfully.');

        return redirect(route('tags.index'));
    }

    /**
     * Display the specified tags.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tags = $this->tagsRepository->find($id);

        if (empty($tags)) {
            Flash::error('Tags not found');

            return redirect(route('tags.index'));
        }

        return view('tags.show')->with('tags', $tags);
    }

    /**
     * Show the form for editing the specified tags.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tags = $this->tagsRepository->find($id);

        if (empty($tags)) {
            Flash::error('Tags not found');

            return redirect(route('tags.index'));
        }

        return view('tags.edit')->with('tags', $tags);
    }

    /**
     * Update the specified tags in storage.
     *
     * @param  int              $id
     * @param UpdatetagsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetagsRequest $request)
    {
        $tags = $this->tagsRepository->find($id);

        if (empty($tags)) {
            Flash::error('Tags not found');

            return redirect(route('tags.index'));
        }

        $tags = $this->tagsRepository->update($request->all(), $id);

        Flash::success('Tags updated successfully.');

        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified tags from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tags = $this->tagsRepository->find($id);

        if (empty($tags)) {
            Flash::error('Tags not found');

            return redirect(route('tags.index'));
        }

        $this->tagsRepository->delete($id);

        Flash::success('Tags deleted successfully.');

        return redirect(route('tags.index'));
    }
}
