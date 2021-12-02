<?php

namespace App\Http\Controllers\company;

use App\DataTables\sessionsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesessionsRequest;
use App\Http\Requests\UpdatesessionsRequest;
use App\Repositories\sessionsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\cities;
use App\Models\countries;
use App\Models\courses;
use App\Models\sessions;
use App\Models\language;
use App\Models\states;
use Response;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Imports\sessionsImport;
use Illuminate\Support\Str;

class sessionsController extends AppBaseController
{
    /** @var  sessionsRepository */
    private $sessionsRepository;

    public function __construct(sessionsRepository $sessionsRepo)
    {
        $this->sessionsRepository = $sessionsRepo;
    }

    /**
     * Display a listing of the sessions.
     *
     * @param sessionsDataTable $sessionsDataTable
     * @return Response
     */
    public function index(sessionsDataTable $sessionsDataTable)
    {
        return $sessionsDataTable->render('sessions.index');
    }

    /**
     * Show the form for creating a new sessions.
     *
     * @return Response
     */
    public function create()
    {
        /**get courses List and send them to selection list in blade */
        if(auth()->user()->hasRole('company'))
        $listcourses = courses::where('company_id', auth()->user()->companies->id)->pluck('title', 'id');
        else
        $listcourses = courses::pluck('title', 'id');
        /**get countries List and send them to selection list in blade */

        $listcountries = countries::orderBy('name', 'asc')->pluck('name', 'id');
        $countries = countries::orderBy('name', 'asc')->get();

        /**get states List and send them to selection list in blade */
        $liststates = states::pluck('name', 'id');

        /**get language List and send them to selection list in blade */
        $listlanguage = language::pluck('name', 'id');

        /**get cities List and send them to selection list in blade */
        $listcities = cities::pluck('name', 'id');

        //  var_dump("hello");
        return view('sessions.create', compact(
            'listlanguage',
            'listcourses',
            'listcountries',
            'liststates',
            'countries',
            'listcities'));

    }

    /**create a session from course view  */
    public function createfromcourseform($id)
    {

        /**get courses List and send them to selection list in blade */

        $listcourses = courses::where('company_id', auth()->user()->companies->id)->where('id', $id)->pluck('title', 'id');

        // var_dump($listcourses);
        /**get countries List and send them to selection list in blade */
        $listcountries = countries::pluck('name', 'id');

        $countries = countries::orderBy('name', 'asc')->get();
        /**get states List and send them to selection list in blade */
        $liststates = states::pluck('name', 'id');

        /**get language List and send them to selection list in blade */
        $listlanguage = language::pluck('name', 'id');

        /**get cities List and send them to selection list in blade */
        $listcities = cities::pluck('name', 'id');

        //  var_dump("hello");
        return view('sessions.create', compact(
            'listlanguage',
            'listcourses',
            'listcountries',
            'liststates',
            'listcities',
            'countries'));

    }

    /**
     * Store a newly created sessions in storage.
     *
     * @param CreatesessionsRequest $request
     *
     * @return Response
     */
    public function store(CreatesessionsRequest $request)
    {
        $input = $request->all();

        $sessions = $this->sessionsRepository->create($input);
         activity()->withoutLogs(function () use ($sessions){
            $sessions->slug = Str::slug($sessions->courses->title."_".date_format($sessions->start,"Y-m-d")."_".$sessions->id,"_");
            $sessions->save();
          });
        toastr()->success('Sessions saved successfully.');

        return redirect(route('sessions.show',$sessions->id));
    }

    /**
     * Display the specified sessions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sessions = $this->sessionsRepository->find($id);

        if (empty($sessions) || !$sessions->my()) {
            Flash::error('Sessions not found');

            return redirect(route('sessions.index'));
        }
        $regstrionList = $sessions->registerations()->paginate(6);


        $activity = Activity::where('subject_type', $sessions->getMorphClass())->Where('subject_id', $sessions->getKey())->orderBy('id', 'DESC')->get();

        return view('sessions.show')->with(['sessions'=> $sessions,'activity'=> $activity, 'regstrionList'=> $regstrionList]);
    }

    /**
     * Show the form for editing the specified sessions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sessions = $this->sessionsRepository->find($id);

        if (empty($sessions) || !$sessions->my()) {
            Flash::error('Sessions not found');

            return redirect(route('sessions.index'));
        }

        /**get courses List and send them to selection list in blade */
        if(auth()->user()->hasRole('admin'))
        $listcourses = courses::pluck('title', 'id');
        else
        $listcourses = courses::where('company_id', auth()->user()->companies->id)->pluck('title', 'id');
        /**get countries List and send them to selection list in blade */
        $listcountries = countries::pluck('name', 'id');


        /**get states List and send them to selection list in blade */
        $liststates = states::pluck('name', 'id');

        /**get language List and send them to selection list in blade */
        $listlanguage = language::pluck('name', 'id');

        /**get cities List and send them to selection list in blade */
        $listcities = cities::pluck('name', 'id');

        return view('sessions.edit', compact(
            'sessions',
            'listlanguage',
            'listcourses',
            'listcountries',
            'liststates',
            'listcities'));


    }

    /**
     * Update the specified sessions in storage.
     *
     * @param  int              $id
     * @param UpdatesessionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesessionsRequest $request)
    {
        $sessions = $this->sessionsRepository->find($id);

        if (empty($sessions)) {
            Flash::error('Sessions not found');

            return redirect(route('sessions.index'));
        }

        $sessions = $this->sessionsRepository->update($request->all(), $id);

        Flash::success('Sessions updated successfully.');

        return redirect(route('sessions.show',$sessions->id));
    }

    /**
     * Remove the specified sessions from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sessions = $this->sessionsRepository->find($id);

        if (empty($sessions) || !$sessions->my()) {
            Flash::error('Sessions not found');

            return redirect(route('sessions.index'));
        }

        $this->sessionsRepository->delete($id);

        Flash::success('Sessions deleted successfully.');

        return redirect(route('sessions.index'));
    }

    public function reset($id)
    {
        $sessions = sessions::withTrashed()->find($id);

        if (empty($sessions) || !$sessions->my()) {
            Flash::error('Sessions not found');

            return redirect(route('sessions.index'));
        }

        $sessions->deleted_at = NULL;
        $sessions->save();


        toastr()->success('Sessions reset successfully.');

        return redirect(route('sessions.show',$sessions->id));
    }

    public function publish($id,$action)
    {
        $sessions = $this->sessionsRepository->find($id);

        if (empty($sessions) || !$sessions->my()) {
            Flash::error('Sessions not found');

            return redirect(route('sessions.index'));
        }

        $sessions->publish = $action;
        $sessions->save();


        toastr()->success('Sessions publish successfully.');

        return redirect(route('sessions.show',$sessions->id));
    }

    public function import()
    {
        return view('sessions.import');
    }

    public function importExcel(Request $request)
    {
        if($request->import_file && auth()->user()->hasRole('admin') ){

            try {
                \Excel::import(new sessionsImport,$request->import_file);
                Flash::success('Your file is imported successfully in database.');
            } catch (\Illuminate\Database\QueryException $e) {
                report($e);
                Flash::error('error exel importation ');
            }
        }else{
            Flash::error('error');
        }


        return back();

    }
}
