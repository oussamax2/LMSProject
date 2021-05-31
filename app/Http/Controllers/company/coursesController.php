<?php

namespace App\Http\Controllers\company;

use App\DataTables\coursesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatecoursesRequest;
use App\Http\Requests\UpdatecoursesRequest;
use App\Repositories\coursesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\categories;
use App\Models\target_audiance;
use Response;

class coursesController extends AppBaseController
{
    /** @var  coursesRepository */
    private $coursesRepository;

    public function __construct(coursesRepository $coursesRepo)
    {
        $this->coursesRepository = $coursesRepo;
    }

    /**
     * Display a listing of the courses.
     *
     * @param coursesDataTable $coursesDataTable
     * @return Response
     */
    public function index(coursesDataTable $coursesDataTable)
    {

        return $coursesDataTable->render('courses.index');



    }

    /**
     * Show the form for creating a new courses.
     *
     * @return Response
     */
    public function create()
    {
        /**get categories List and send them to selection list in blade */
        $listcateg = categories::pluck('name', 'id');
        /**get targetAudiance List and send them to selection list in blade */
        $listtarget = target_audiance::pluck('name', 'id');

        return view('courses.create', compact('listcateg', 'listtarget'));
    }

    /**
     * Store a newly created courses in storage.
     *
     * @param CreatecoursesRequest $request
     *
     * @return Response
     */
    public function store(CreatecoursesRequest $request)
    {
        $input = $request->all();
        $input['company_id']= auth()->user()->companies->id;
        $courses = $this->coursesRepository->create($input);
        $courses->target_audiance()->sync($request->target_id);
        Flash::success('Courses saved successfully.');

        return redirect(route('courses.index'));
        
        
        
    }

    /**
     * Display the specified courses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $courses = $this->coursesRepository->find($id);

        if (empty($courses)  || !$courses->my()) {
            Flash::error('Courses not found');

            return redirect(route('courses.index'));
        }

        return view('courses.show')->with('courses', $courses);
    }

    /**
     * Show the form for editing the specified courses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $courses = $this->coursesRepository->find($id);

        if (empty($courses) || !$courses->my()) {
            Flash::error('Courses not found');

            return redirect(route('courses.index'));
        }
        /**get categories List and send them to selection list in blade */
        $listcateg = categories::pluck('name', 'id');
        /**get targetAudiance List and send them to selection list in blade */
        $listtarget = target_audiance::pluck('name', 'id');

        $targetvalues = $courses->target_audiance(['*'])->get();
       // var_dump($targetvalues);
        return view('courses.edit', compact(
            'targetvalues',
            'courses',
            'listcateg',
            'listtarget'
        ));
    }

    /**
     * Update the specified courses in storage.
     *
     * @param  int              $id
     * @param UpdatecoursesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecoursesRequest $request)
    {
        $courses = $this->coursesRepository->find($id);

        if (empty($courses)) {
            Flash::error('Courses not found');

            return redirect(route('courses.index'));
        }

        $courses = $this->coursesRepository->update($request->all(), $id);
        $courses->target_audiance()->sync($request->target_id);
        Flash::success('Courses updated successfully.');

        return redirect()->back();
    }

    /**
     * Remove the specified courses from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $courses = $this->coursesRepository->find($id);

        if (empty($courses) || !$courses->my()) {
            Flash::error('Courses not found');

            return redirect(route('courses.index'));
        }

        $this->coursesRepository->delete($id);

        Flash::success('Courses deleted successfully.');

        return redirect(route('courses.index'));
    }
}
