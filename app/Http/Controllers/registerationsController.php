<?php

namespace App\Http\Controllers;

use App\DataTables\registerationsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateregisterationsRequest;
use App\Http\Requests\UpdateregisterationsRequest;
use App\Repositories\registerationsRepository;
use Flash;
use App\Models\registerations;
use App\Models\Mailsender;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use App\Models\sessions;
use App\Models\courses;
use App\Models\categories;
use app\Models\User;
use Carbon\Carbon;

class registerationsController extends AppBaseController
{
    /** @var  registerationsRepository */
    private $registerationsRepository;

    public function __construct(registerationsRepository $registerationsRepo)
    {
        $this->registerationsRepository = $registerationsRepo;
    }

    /**
     * Display a listing of the registerationsuser.
     *
     * @param registerationsDataTable $registerationsDataTable
     * @return Response
     */
    public function index(registerationsDataTable $registerationsDataTable)
    {
        return $registerationsDataTable->render('registerationsuser.index');
    }

    /**
     * Show the form for creating a new registerationsuser.
     *
     * @return Response
     */
    public function create()
    {
        return view('registerationsuser.create');
    }

    /**
     * Store a newly created registerations in storage.
     *
     * @param CreateregisterationsRequest $request
     *
     * @return Response
     */
    public function store(CreateregisterationsRequest $request)
    {
        $input = $request->all();

        $registerations = $this->registerationsRepository->create($input);

        Flash::success('Registerations saved successfully.');

        return redirect(route('registerationsuser.index'));
    }

    /**
     * Display the specified registerationsuser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $registerations = $this->registerationsRepository->find($id);

        if (empty($registerations) || !($registerations->user_id == auth()->user()->id)) {
            Flash::error('Registerations not found');

            return redirect(route('registerationsuser.index'));
        }
        $registerations->notif=0;
        $registerations->save();
        return view('registerationsuser.show')->with('registerations', $registerations);
    }

    /**
     * Show the form for editing the specified registerationsuser.
     *
     * @param  int $id
     *
     * @return Response
     */


    /**
     * Remove the specified registerations from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $registerations = $this->registerationsRepository->find($id);

        if (empty($registerations) || !$registerations->my()) {
            Flash::error('Registerations not found');

            return redirect(route('registerationsuser.index'));
        }

        $this->registerationsRepository->delete($id);

        Flash::success('Registerations deleted successfully.');

        return redirect(route('registerationsuser.index'));
    }



    public function actionpay($id)
    {
        $registerations = $this->registerationsRepository->find($id);
        if(!$registerations->id_trans && $registerations->my() ){
        $url = "https://eu-test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                    "&amount=" .$registerations->sessions->fee.
                    "&currency=USD" .
                    "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                       'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData= json_decode($responseData, true);
       return view('pay', ['idreg'=>$id , 'id'=>$responseData['id'],'registerations' =>$registerations ]);
    }
    }

    public function getpay($idreg)
    {

        $id=  request('id');
        $url = "https://test.oppwa.com/v1/checkouts/".$id."/payment";
	$url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);

    $responseData = json_decode($responseData, true);

	 if($responseData['id'])
     {
        $registerations = $this->registerationsRepository->find($idreg);

        if (empty($registerations) || !($registerations->user_id == auth()->user()->id)) {
            Flash::error('Registerations not found');

            return redirect(route('registerationsuser.index'));
        }
        $registerations->notif=0;
        $registerations->status = 3;
        $registerations->id_trans = $responseData['id'];
        $registerations->save();
        Flash::success('Payment successful');
        return view('registerationsuser.show')->with('registerations', $registerations);

     }

    }

    function getstatus($id){

        $registerations = $this->registerationsRepository->find($id);

    $url = "https://test.oppwa.com/v1/query/".$registerations->id_trans;
	$url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
    $responseData = json_decode($responseData, true);
	return $responseData;

    }

    /** confirm registration_request  */
    public function agree_registrtion($id)
    {

        $sessions = sessions::find($id);

        return view('front.confirmedregister')->with('sessions', $sessions);
    }

    /** send registration_request  */
    public function student_registsess(Request $request)
    {
        // $request->session
        // auth()->user()->id;
//         $input = $request->validate([
//            'session' => 'required',
//            'agreetrm.*' => 'required_without_all'
//         ]);
// //         $input = $request->all();
// var_dump($input);
// die();
        $sessions = sessions::find($request->session);
        if($sessions->status && $sessions->courses->status){

        $registerations = registerations::firstOrCreate(array(
            'session_id' =>  $request->session,
            'user_id' => auth()->user()->id)
        );
        /**save in DB */
        $registerations->save();

        activity()
        ->performedOn($sessions)
        ->log('registred user');
        /** mail to company */
        Mailsender::sendcompany(auth()->user()->id,$registerations->id,$sessions->companies->user->id);

        toastr()->success('Your registration send with success !');
        return redirect(url('dashboarduser/registerationsuser',$registerations->id));

    }else{
        return redirect(route('home'));
    }
}


    /** cancel registration_request  */
    public function cancelregistrtion($id)
    {

        $registerations = $this->registerationsRepository->find($id);
    if(Carbon::now() <= Carbon::parse($registerations->sessions->start->subDays($registerations->sessions->companies->cancelpd)))
        {

            $registerations->status = 4;
            /**save in DB */
            $registerations->notifcompany=1;
            $registerations->save();
            $sessions = sessions::find($registerations->session_id);
            /** mail to company */
            Mailsender::sendcompany(auth()->user()->id,$registerations->id,$sessions->companies->user->id);

            toastr()->success('Your request send with success !');
            return redirect(url('dashboarduser/registerationsuser',$registerations->id));
        }

    }


    /** clear registration_request notif for user&company */
    public function clearnotif()
    {



        //   var_dump($id);

        $user = auth()->user();


        if($user->hasRole('company')){


            registerations::with(['sessions', 'sessions.courses'])->whereHas('sessions.courses', function ($query) use ($user){
                    $query->where('company_id',$user->companies->id);
                    })->where('notifcompany',1)->update(['notifcompany' => 0],['timestamps' => false]);

                // var_dump($notifcompanyy);




        }elseif($user->hasRole('user')){
            registerations::where('user_id', '=', $user->id)->where('notif',1)->update(['notif' => 0],['timestamps' => false]);
        }
        return redirect()->back();
    }
}
