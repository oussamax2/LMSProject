<?php

namespace App\Http\Controllers;

use App\DataTables\subcategorieDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesubcategorieRequest;
use App\Http\Requests\UpdatesubcategorieRequest;
use App\Repositories\subcategorieRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\categories;

class subcategorieController extends AppBaseController
{
    /** @var  subcategorieRepository */
    private $subcategorieRepository;

    public function __construct(subcategorieRepository $subcategorieRepo)
    {
        $this->subcategorieRepository = $subcategorieRepo;
    }

    /**
     * Display a listing of the subcategorie.
     *
     * @param subcategorieDataTable $subcategorieDataTable
     * @return Response
     */
    public function index(subcategorieDataTable $subcategorieDataTable)
    {
        return $subcategorieDataTable->render('subcategories.index');
    }

    /**
     * Show the form for creating a new subcategorie.
     *
     * @return Response
     */
    public function create()
    {
        /**get categories List and send them to selection list in blade */
         $listcateg = categories::pluck('name', 'id');

        $selectedID = 1; 
        return view('subcategories.create', compact('selectedID', 'listcateg'));
        
    }

    /**
     * Store a newly created subcategorie in storage.
     *
     * @param CreatesubcategorieRequest $request
     *
     * @return Response
     */
    public function store(CreatesubcategorieRequest $request)
    {
        $input = $request->all();
       
        $subcategorie = $this->subcategorieRepository->create($input);
        $subcategorie->category_id = $request->input('category_id');
        $subcategorie->save();
        //  var_dump($subcategorie);
        Flash::success(__('saved successfully.'));

        return redirect(route('subcategories.index'));
    }

    /**
     * Display the specified subcategorie.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subcategorie = $this->subcategorieRepository->find($id);

        if (empty($subcategorie)) {
            Flash::error('Subcategorie not found');

            return redirect(route('subcategories.index'));
        }

        return view('subcategories.show')->with('subcategorie', $subcategorie);
    }

    /**
     * Show the form for editing the specified subcategorie.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subcategorie = $this->subcategorieRepository->find($id);

        if (empty($subcategorie)) {
            Flash::error('Subcategorie not found');

            return redirect(route('subcategories.index'));
        }

        return view('subcategories.edit')->with('subcategorie', $subcategorie);
    }

    /**
     * Update the specified subcategorie in storage.
     *
     * @param  int              $id
     * @param UpdatesubcategorieRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesubcategorieRequest $request)
    {
        $subcategorie = $this->subcategorieRepository->find($id);

        if (empty($subcategorie)) {
            Flash::error('Subcategorie not found');

            return redirect(route('subcategories.index'));
        }

        $subcategorie = $this->subcategorieRepository->update($request->all(), $id);

        Flash::success('Subcategorie updated successfully.');

        return redirect(route('subcategories.index'));
    }

    /**
     * Remove the specified subcategorie from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subcategorie = $this->subcategorieRepository->find($id);

        if (empty($subcategorie)) {
            Flash::error('Subcategorie not found');

            return redirect(route('subcategories.index'));
        }

        $this->subcategorieRepository->delete($id);

        Flash::success('Subcategorie deleted successfully.');

        return redirect(route('subcategories.index'));
    }
}
