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
        }
        .information-user-company .content-mail-send{
            background:
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
                    <p style="text-align:center">accept</p>
                    @else
                    <p style="text-align:center">decline</p>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

