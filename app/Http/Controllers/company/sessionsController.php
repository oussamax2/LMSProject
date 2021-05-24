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
use App\Models\states;
use Response;

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
        $listcourses = courses::pluck('title', 'id');
        $selectedID = 1;  
        
        /**get countries List and send them to selection list in blade */
        $listcountries = countries::pluck('name', 'id');

        
        /**get states List and send them to selection list in blade */
        $liststates = states::pluck('name', 'id');
        
        
        /**get cities List and send them to selection list in blade */
        $listcities = cities::pluck('name', 'id');

        //  var_dump("hello");    
        return view('sessions.create', compact(
            'selectedID', 
            'listcourses', 
            'listcountries',
            'liststates',
            'listcities'));
        
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

        Flash::success('Sessions saved successfully.');

        return redirect(route('sessions.index'));
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

        if (empty($sessions)) {
            Flash::error('Sessions not found');

            return redirect(route('sessions.index'));
        }

        return view('sessions.show')->with('sessions', $sessions);
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

        if (empty($sessions)) {
            Flash::error('Sessions not found');

            return redirect(route('sessions.index'));
        }

        /**get courses List and send them to selection list in blade */
        $listcourses = courses::pluck('title', 'id');
        $selectedID = 1;   
        
        /**get countries List and send them to selection list in blade */
        $listcountries = countries::pluck('name', 'id');
        
               
        /**get states List and send them to selection list in blade */
        $liststates = states::pluck('name', 'id');
        
        
        /**get cities List and send them to selection list in blade */
        $listcities = cities::pluck('name', 'id');
         
        return view('sessions.edit', compact(
            'sessions',     
            'selectedID', 
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

        return redirect(route('sessions.index'));
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

        if (empty($sessions)) {
            Flash::error('Sessions not found');

            return redirect(route('sessions.index'));
        }

        $this->sessionsRepository->delete($id);

        Flash::success('Sessions deleted successfully.');

        return redirect(route('sessions.index'));
    }
}
