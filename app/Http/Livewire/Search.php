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
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.search',[

            'sessionList' => sessions::with(["courses" => function($q) use ($searchTerm){
                $q->where('courses.title','like', $searchTerm);
            }])->orderBy('id', 'desc')->paginate(2)
        ]);
    }


}

