<?php

namespace App\Http\Controllers;

use App\DataTables\companiesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatecompaniesRequest;
use App\Http\Requests\UpdatecompaniesRequest;
use App\Repositories\companiesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\User;
use App\Models\companies;
use App\Models\cities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;

class companiesController extends AppBaseController
{
    /** @var  companiesRepository */
    private $companiesRepository;

    public function __construct(companiesRepository $companiesRepo)
    {
        $this->companiesRepository = $companiesRepo;
    }

    /**
     * Display a listing of the companies.
     *
     * @param companiesDataTable $companiesDataTable
     * @return Response
     */
    public function index(companiesDataTable $companiesDataTable)
    {
        return $companiesDataTable->render('companies.index');
    }

    /**
     * Show the form for creating a new companies.
     *
     * @return Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created companies in storage.
     *
     * @param CreatecompaniesRequest $request
     *
     * @return Response
     */
    public function store(CreatecompaniesRequest $request)
    {
        $input = $request->all();

        $companies = $this->companiesRepository->create($input);

        Flash::success(__('admin.Company saved successfully.'));

        return redirect(route('companies.index'));
    }

    /**
     * Display the specified companies.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companies = $this->companiesRepository->find($id);

        if (empty($companies)) {
            Flash::error(__('admin.Company not found'));

            return redirect(route('companies.index'));
        }
        /**get all courses of ths companies */
        $listcourses = $companies->courses()->get();
        

        /**get cities List */
        $listcities = cities::all();

        return view('companies.show')->with([
            'companies'=>$companies,
            'listcourses'=>$listcourses,
            'listcities'=>$listcities,
        
        ]);
    }

    /**
     * Show the form for editing the specified companies.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companies = $this->companiesRepository->find($id);

        if (empty($companies)) {
            Flash::error(__('admin.Company not found'));

            return redirect(route('companies.index'));
        }

        return view('companies.edit')->with('companies', $companies);
    }



    public function saveImagecompany(UploadedFile $file) : string
    {
        return $file->store('companies_pictures', ['disk' => 'public']);
    }

    /**
     * Update the specified companies in storage.
     *
     * @param  int              $id
     * @param UpdatecompaniesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecompaniesRequest $request)
    {

        if ($request->has('picture')){
         
            $image = $this->saveImagecompany($request->file('picture'));

            $companies = $this->companiesRepository->find($id);
           
            // $companies->picture = $image;
                        
            if (empty($companies)) {
                Flash::error(__('admin.Company not found'));

                return redirect(route('companies.index'));
            }
                        
            $companies = $this->companiesRepository->update($request->all(), $id);
            $companies->picture = $image;
            $companies->save();

            $userfind = User::find($companies->user->id);
            $userfind->name = $request->name;
            $userfind->email = $request->email;

            $userfind->save();

        }else{

            $companies = $this->companiesRepository->find($id);
                                  
            if (empty($companies)) {
                Flash::error(__('admin.Company not found'));

                return redirect(route('companies.index'));
            }

            $companies = $this->companiesRepository->update($request->all(), $id);
            $userfind = User::find($companies->user->id);
            $userfind->name = $request->name;
            $userfind->email = $request->email;

            $userfind->save();
        }




        Flash::success(__('admin.updated successfully.'));

        return redirect(route('companies.index'));
    }
    /**
     * Update the specified company's request in storage.
     *
     * @param  int              $id
     * @param UpdatecompaniesRequest $request
     *
     * @return Response
     */
    public function update_companyreqst($id)
    {
        $companies = $this->companiesRepository->find($id);

        if (empty($companies)) {
            Flash::error(__('admin.Company not found'));

            return redirect(route('companies.index'));
        }
       /**if admin clicked on acceptcompany button=> the company'status will be 1 ~ accepted company's request */
       if (isset($_POST['acceptcompany'])) {

            $companies->status = 1;
       /**if admin clicked on declinecompany button=> the company'status will be 2 ~ rejected company's request */
       } else {

            $companies->status = 2;
         
       }
       /**save status in DB */
       $companies->save();
       Flash::success(__('admin.updated successfully.'));

       return redirect(route('companies.index'));
    }
    /**
     * Remove the specified companies from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companies = $this->companiesRepository->find($id);

        if (empty($companies)) {
            Flash::error(__('admin.Company not found'));

            return redirect(route('companies.index'));
        }

        $this->companiesRepository->delete($id);

        Flash::success(__('admin.deleted successfully.'));

        return redirect(route('companies.index'));
    }
}
