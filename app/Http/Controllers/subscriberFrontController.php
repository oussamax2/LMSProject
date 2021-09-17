<?php

namespace App\Http\Controllers;

use App\DataTables\subscribersDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesubscribersRequest;
use App\Http\Requests\UpdatesubscribersRequest;
use App\Repositories\subscribersRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\subscribers;
use Response;

class subscriberFrontController extends AppBaseController
{
    /** @var  subscribersRepository */
    private $subscribersRepository;

    public function __construct(subscribersRepository $subscribersRepo)
    {
        $this->subscribersRepository = $subscribersRepo;
    }

    /**
     * Store a newly created subscribers in storage.
     *
     * @param CreatesubscribersRequest $request
     *
     * @return Response
     */
    public function store(CreatesubscribersRequest $request)
    {
        $input = $request->all();

       

        
        $findsubscribers = subscribers::where('email',$request->email)->count();

        if ($findsubscribers == 0) {
            $subscribers = $this->subscribersRepository->create($input);
            toastr()->success(__('front.Subscribe saved successfully. !'));
        }else{
            toastr()->error(__('front.subscriber already exists !'));
        }
        
        
        
        
        return redirect()->back();
    }

   
}
