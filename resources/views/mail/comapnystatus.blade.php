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
        box-shadow: 0px 0px 10px 0px rgb(0 0 0 / 20%);
        }
        .information-user-company .content-mail-send h3{
        font-size: 20px;
        text-transform: uppercase;
        font-weight: 500;
        }
        .information-user-company .content-mail-send p{
            font-size: 15px;
            font-weight: 400;
        }
        .information-user-company .content-mail-send a{
            text-decoration: none;
            color: #36d64c;
            font-size: 15px;
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
                    @if ($status == 2)
                    <p>your request was successfully accepted</p>
                    <a href="{{ url('/dashboard') }}">Your dashboard</a>
                    @else
                    <p>your request has been declined</p>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

