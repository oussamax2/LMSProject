<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\sessions;
use Illuminate\Database\Eloquent\Builder;
class Search extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $category;
    public $subcategory;
    public $target;


    public function render()
    {
        $query = sessions::with(['courses','countries','cities','states']);
        $query->when(! empty($this->searchTerm), function (Builder $q) {
            $q->whereHas('courses', function (Builder $q){
                $q->where('courses.title','like', '%'.$this->searchTerm.'%')
                 ->Orwhere('courses.body','like', '%'.$this->searchTerm.'%');
             });
        });

         $query->when(! empty($this->category), function (Builder $q) {

            $q->whereHas('courses', function (Builder $q){
                $q->where('courses.category_id', $this->category);
             });
        });
        $query->when(! empty($this->target), function (Builder $q) {

            $q->whereHas('courses', function (Builder $q){
                $q->whereHas('target_audiance',function($q){

                    $q->whereIn('target_audiances.id',$this->target);
                }
            );
             });
        });
     /*   $query->when(! empty($this->target), function (Builder $q) {

            $q->whereHas('courses', function (Builder $q){
                $q->where('courses.category_id', $this->category);
             });
        });*/

         $sessions = $query->paginate(6);
        return view('livewire.search',[

            'sessionList' =>$sessions
        ]);
    }



}

