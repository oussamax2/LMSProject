<?php

namespace App\Http\Controllers;

use App\DataTables\categoriesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatecategoriesRequest;
use App\Http\Requests\UpdatecategoriesRequest;
use App\Repositories\categoriesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Response;

class categoriesController extends AppBaseController
{
    /** @var  categoriesRepository */
    private $categoriesRepository;

    public function __construct(categoriesRepository $categoriesRepo)
    {
        $this->categoriesRepository = $categoriesRepo;
    }

    /**
     * Display a listing of the categories.
     *
     * @param categoriesDataTable $categoriesDataTable
     * @return Response
     */
    public function index(categoriesDataTable $categoriesDataTable)
    {
        return $categoriesDataTable->render('categories.index');
    }

    /**
     * Show the form for creating a new categories.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create');
    }

    public function savecategpicture(UploadedFile $file) : string
    {
        return $file->store('categories_pictures', ['disk' => 'public']);
    }

    /**
     * Store a newly created categories in storage.
     *
     * @param CreatecategoriesRequest $request
     *
     * @return Response
     */
    public function store(CreatecategoriesRequest $request)
    {

        
       
        /**save image in intended folder */
        $image = $this->savecategpicture($request->file('picture'));

        $input = $request->all();
        $categories = $this->categoriesRepository->create($input);
        /**save image in database column */
        $categories->picture = $image;
        $categories->save();
            

        Flash::success(__('admin.saved successfully.'));

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified categories.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categories = $this->categoriesRepository->find($id);

        if (empty($categories)) {
            Flash::error('Categories not found');

            return redirect(route('categories.index'));
        }
        /**get all Subcategories of this category */
        $listsubcateg = $categories->subcategorie()->get();
        // var_dump($listsubcateg);
        return view('categories.show')->with([
            'categories'=>$categories,
            'listsubcateg'=>$listsubcateg
            
            ]);
    }

    /**
     * Show the form for editing the specified categories.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categories = $this->categoriesRepository->find($id);

        if (empty($categories)) {
            Flash::error('Categories not found');

            return redirect(route('categories.index'));
        }

        return view('categories.edit')->with('categories', $categories);
    }

    /**
     * Update the specified categories in storage.
     *
     * @param  int              $id
     * @param UpdatecategoriesRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        if ($request->has('picture')){
                /**save image in intended folder */
                $image = $this->savecategpicture($request->file('picture'));

                $categories = $this->categoriesRepository->find($id);

                if (empty($categories)) {
                    Flash::error('Categories not found');

                    return redirect(route('categories.index'));
                }

                $categories = $this->categoriesRepository->update($request->all(), $id);
                /**save image in database column */
                $categories->picture = $image;
                $categories->save();

            }else{

                $categories = $this->categoriesRepository->find($id);

                if (empty($categories)) {
                    Flash::error('Categories not found');

                    return redirect(route('categories.index'));
                }
                
                $currentpicture = $categories->picture;
                $categories = $this->categoriesRepository->update($request->all(), $id);
                /**save image in database column */
                $categories->picture = $currentpicture;
                $categories->save();

            }

        Flash::success(__('admin.updated successfully.'));

        return redirect()->back();
    }

    /**
     * Remove the specified categories from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categories = $this->categoriesRepository->find($id);

        if (empty($categories)) {
            Flash::error('Categories not found');

            return redirect(route('categories.index'));
        }

        $this->categoriesRepository->delete($id);

        Flash::success('Categories deleted successfully.');

        return redirect(route('categories.index'));
    }
}
