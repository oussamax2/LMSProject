<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\companies;

class LoadMoreCompaniesData extends Component
{
    public $limitPerPage = 4;

    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 4;
    }

    public function render()
    {
        $companies = companies::latest()->where('status',2)->paginate($this->limitPerPage);
        $this->emit('userStore');

        // $countcompanies = count($companies);
        return view('livewire.load-more-companies-data', ['companies' => $companies]);
    }
}
