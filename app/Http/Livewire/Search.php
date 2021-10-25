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
    public $city;
    public $country;
    public $pricemin;
    public $pricemax;
    public $datemin;
    public $datemax;
    public $price;
    public $all;
    public $free;
    public $company;
    public $type;
    public $elearning;
    public $classroom;
    public $online;
    public function render()
    {
        $query = sessions::with(['courses','countries','cities','states'])->where('publish',1)->whereDate('end', '>=', date('Y-m-d'));
        $query->when(! empty($this->searchTerm), function (Builder $q) {
            $q->whereHas('courses', function (Builder $q){
                $q->where('courses.title','like', '%'.$this->searchTerm.'%')
                 ->Orwhere('courses.body','like', '%'.$this->searchTerm.'%');
             });
        });
        $query->when(! empty($this->city), function (Builder $q) {
                $q->where('city',$this->city);
        });
        $query->when(! empty($this->type), function (Builder $q) {
            $q->where('sess_type',$this->type);
    });
        $query->when(! empty($this->country), function (Builder $q) {
            $q->where('country_id',$this->country);
        });
        $query->when(! empty($this->price), function (Builder $q) {
            $q->whereBetween('fee', [$this->pricemin, $this->pricemax]);
        });
        $query->when( !empty($this->datemin) && !empty($this->datemax) , function (Builder $q) {
            $q->whereBetween('start', [$this->datemin, $this->datemax]);
        });
         $query->when(! empty($this->category), function (Builder $q) {

            $q->whereHas('courses', function (Builder $q){
                $q->where('courses.category_id', $this->category);
             });
        });
        $query->when(! empty($this->company), function (Builder $q) {

            $q->whereHas('courses', function (Builder $q){
                $q->where('courses.company_id', $this->company);
             });
        });
        $query->when(! empty($this->subcategory), function (Builder $q) {

            $q->whereHas('courses', function (Builder $q){
                $q->where('courses.subcateg_id', $this->subcategory);
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

         $sessions = $query->orderBy('start','DESC')->paginate(6);

        return view('livewire.search',[

            'sessionList' =>$sessions
        ]);
    }

    public function resetsearch()
    {
        $this->searchTerm ="";
        $this->category="";
        $this->subcategory="";
        $this->target="";
        $this->city="";
        $this->type="";
        $this->company="";
        $this->country="";
        $this->pricemin=0;
        $this->pricemax=0;
        $this->datemin="";
        $this->datemax="";
        $this->price=0;
        $this->all=1;
        $this->free=0;
        $this->elearning=0;
        $this->classroom=0;
        $this->online=0;
    }
    public function elearning()
    {
        $this->type="E-learning";
        $this->elearning=1;
        $this->classroom=0;
        $this->online=0;
        $this->all=0;
    }
    public function classroom()
    {
        $this->type="Classroom";
        $this->elearning=0;
        $this->classroom=1;
        $this->online=0;
        $this->all=0;
    }

    public function online()
    {
        $this->type="Online";
        $this->elearning=0;
        $this->classroom=0;
        $this->online=1;
        $this->all=0;
    }



}

