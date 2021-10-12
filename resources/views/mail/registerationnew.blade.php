
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                            <a href="{{ url('/dashboard/registerations', $registeration->id) }}">Registeration</a>
                        </div>
                        <div class="details-registrations">
                        <p>User Name: {{$user->name}}</p>
                        <p>User Email: {{$user->email}}</p>
                        <p>Start Session: {{Carbon\Carbon::parse($registeration->sessions->start)->isoFormat(' Do MMMM  YYYY ')}}</p>
                        <p>End Session: {{Carbon\Carbon::parse($registeration->sessions->end)->isoFormat(' Do MMMM  YYYY ')}}</p>
                        <p>Fee: {{$registeration->sessions->fee}} <strong>USD</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>




