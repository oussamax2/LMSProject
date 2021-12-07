
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
    <style>
    .information-user-company{
        justify-content:center;
        text-align:center;
        align-items:center;
        margin:auto;
        background:#f3f3f3;
        padding:25px;
        }
        .information-user-company .content-mail-send h3{
        font-size: 20px;
        text-transform: uppercase;
        font-weight: 500;
        }
        .information-user-company .details-registrations{
            justify-content: left;
            align-items: flex-start;
            text-align: left;
            background:#fff;
            padding:20px;
        }
        .information-user-company .linkfordahsboard{
            margin-bottom:15px;
        }
        .information-user-company .linkfordahsboard a{
          text-decoration:none;
        }
        .information-user-company .details-registrations p{
            color:#09174c;
        }
        .information-user-company .image-logolms img{
            width:150px;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="information-user-company">
                    <div class="image-logolms">
                        <img src="https://i.postimg.cc/fLq6Rgmg/logo3.png" alt="">
                    </div>
                    <div class="content-mail-send">
                        <h3>welcome {{$name}}</h3>
                        <div class="linkfordahsboard">
                        @if($registeration->status ==4)
                        <a href="{{ url('/dashboard/registerations', $registeration->id) }}">Registeration Cancelled</a>
                        @elseif($registeration->status ==3)
                            <a href="{{ url('/dashboard/registerations', $registeration->id) }}">Registeration Paid</a>
                        @else
                        <a href="{{ url('/dashboard/registerations', $registeration->id) }}">Registeration</a>
                        @endif
                        </div>
                        <div class="details-registrations">
                        <p>Course: {{$registeration->sessions->courses->title}}</p>
                        <p>Student: {{auth()->user()->name}}</p>
                        <p>Student Email: {{$user->email}}</p>
                        <p>Fee: {{$registeration->sessions->fee}} <strong>USD</strong></p>
                        <p>Session Start: {{Carbon\Carbon::parse($registeration->sessions->start)->isoFormat('llll')}}</p>
                        <p>Session End: {{Carbon\Carbon::parse($registeration->sessions->end)->isoFormat('llll')}}</p>
                        <p>Category: {{$registeration->sessions->courses->categories->name}}</p>
                        <p>Sub-Category: {{isset($registeration->sessions->courses->subcategorie['name']) ?$registeration->sessions->courses->subcategorie['name']: null}}</p>
                        <p>Company: {{$registeration->sessions->companies->user->name}}</p>
                        @foreach($registeration->sessions->courses->target_audiance as $trgetaudce)
                        <p>Target Audience: {{$trgetaudce->name}}</p>
                        @endforeach
                        <p>Country: {{$registeration->sessions->countries->name}}</p>
                        <p>City: {{$registeration->sessions->states->name}}</p>
                        <p>Cancel Period:
                        <span style="color: red;font-weight: bold;">If you want, you must cancel your register before:</span>
                        {{Carbon\Carbon::parse($registeration->sessions->start->subDays($registeration->sessions->companies->cancelpd))->isoFormat('llll')}}
                        </p>
                        <p>Cancel Term: {!!$registeration->sessions->companies->canceltrm!!}</p>
                        <p>Payement Term: {!!$registeration->sessions->companies->paymenttrm!!}</p>
                        <p>General Term: {!!$registeration->sessions->companies->generaltrm!!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>




