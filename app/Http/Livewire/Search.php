<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\sessions;
class Search extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $category;
    public $subcategory;



    public function render()
    {
        $this->category   = "";
        $this->subcategory   = "";
        $searchTerm = '%'.$this->searchTerm.'%';

        return view('livewire.search',[

            'sessionList' => sessions::whereHas('courses', function ($q) use ($searchTerm){
                $q->where('courses.title','like', $searchTerm)
                ->Orwhere('courses.body','like', $searchTerm);
                /*->orwhereHas('companies', function ($q) use ($searchTerm){
                    $q->where('companies.lastname','like', $searchTerm)->Orwhere('courses.body','like', $searchTerm);
                 });*/
             })->paginate(6)
        ]);
    }



}

