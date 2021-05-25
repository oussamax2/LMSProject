<?php

namespace App\Http\Controllers;

use App\DataTables\citiesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatecitiesRequest;
use App\Http\Requests\UpdatecitiesRequest;
use App\Repositories\citiesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\states;
use Illuminate\Http\UploadedFile;
use Response;

class citiesController extends AppBaseController
{
    /** @var  citiesRepository */
    private $citiesRepository;

    public function __construct(citiesRepository $citiesRepo)
    {
        $this->citiesRepository = $citiesRepo;
    }

    /**
     * Display a listing of the cities.
     *
     * @param citiesDataTable $citiesDataTable
     * @return Response
     */
    public function index(citiesDataTable $citiesDataTable)
    {
        return $citiesDataTable->render('cities.index');
    }

    /**
     * Show the form for creating a new cities.
     *
     * @return Response
     */
    public function create()
    {

        /**get states List and send them to selection list in blade */
        $liststates = states::pluck('name', 'id');
        // $selectedID = 1;

        return view('cities.create', compact('liststates'));
    }

    public function savecitiespicture(UploadedFile $file) : string
    {
        return $file->store('cities_pictures', ['disk' => 'public']);
    }


    /**
     * Store a newly created cities in storage.
     *
     * @param CreatecitiesRequest $request
     *
     * @return Response
     */
    public function store(CreatecitiesRequest $request)
    {
        $input = $request->all();

        if ($request->has('picture')){

           /**save image in intended folder */
           $image = $this->savecitiespicture($request->file('picture'));
           $cities = $this->citiesRepository->create($input);
        //    $cities->state_id = $request->input('state_id');
           
           /**save image in database column */
           $cities->picture = $image;
           $cities->save();

        }else{

            $cities = $this->citiesRepository->create($input);
            // $cities->state_id = $request->input('state_id');
            // $cities->save();
        }   

        Flash::success(__('admin.saved successfully.'));

        return redirect(route('cities.index'));
    }

    /**
     * Display the specified cities.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cities = $this->citiesRepository->find($id);

        if (empty($cities)) {
            Flash::error('Cities not found');

            return redirect(route('cities.index'));
        }

        return view('cities.show')->with('cities', $cities);
    }

    /**
     * Show the form for editing the specified cities.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cities = $this->citiesRepository->find($id);

        if (empty($cities)) {
            Flash::error('Cities not found');

            return redirect(route('cities.index'));
        }

       /**get states List and send them to selection list in blade */
       $liststates = states::pluck('name', 'id');
    
        

        return view('cities.edit', compact('cities', 'liststates'));
    }

    /**
     * Update the specified cities in storage.
     *
     * @param  int              $id
     * @param UpdatecitiesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecitiesRequest $request)
    {
        $cities = $this->citiesRepository->find($id);

        if (empty($cities)) {
            Flash::error('Cities not found');

            return redirect(route('cities.index'));
        }

        if ($request->has('picture')){

            /**save image in intended folder */
            $image = $this->savecitiespicture($request->file('picture'));
    
            $cities = $this->citiesRepository->update($request->all(), $id);
            /**save image in database column */
            $cities->picture = $image;
            $cities->save();
 
        }else{

            $cities = $this->citiesRepository->update($request->all(), $id);
        }  




        Flash::success(__('admin.updated successfully.'));

        return redirect()->back();
    }

    /**
     * Remove the specified cities from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cities = $this->citiesRepository->find($id);

        if (empty($cities)) {
            Flash::error('Cities not found');

            return redirect(route('cities.index'));
        }

        $this->citiesRepository->delete($id);

        Flash::success('Cities deleted successfully.');

        return redirect(route('cities.index'));
    }
}
