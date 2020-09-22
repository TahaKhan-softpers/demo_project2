<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }} ">

<head>

    <meta name=" viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        .container {
            float: left;
            width: 100%;
            height: 100%;
            padding: 40px;
        }

        .col-12 {
            width: 100%;
            height: auto;
            float: left;

        }

        .col-8 {
            width: 80%;
            height: auto;
            float: left;
        }

        .jumbotron {
            width: 100%;
            height: 80%;
            border-radius: 10px;
            background-color: #3f9ae5;

        }

        .align-self-center {

            margin: 0 auto;
        }

        .contact-email {
            width: 80%;
            height: 80%;
            font-family: Calibri Light;
            font-weight: normal;
        }

        .button {
            color: white;
            width: 300px;
            font-size: 16px;
            padding: 10px;
            text-align: center;
            height: 50px;
            border-radius: 0px;
            background-color: #0c5460;
            text-decoration-line: none;

        }

        a {
            text-decoration: none;
            text-underline: none;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row align-self-center">
                <div class="col-8">
                    <div class="jumbotron">
                        <div class="row">
                            <div class="col-12"><h1>Hello There !</h1></div>
                            <div class="col-12">
                                <p class="contact-email">

                                    Person {{$user}} has commented on your post "<b>{{$post}} </b>"
                                    <br>

                                    {{--                                    <button  class="button" onclick="window.location.href={{$url}}">Click--}}
                                    {{--                                        me to see your post--}}
                                    {{--                                    </button>--}}
                                    <a role="button" class="button" href="{{$url}}"> Click me to see your post</a>

                                    <br>
                                    Regards ,
                                    <a type="button" class="page-link" href="{{url('')}}">Main Site</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>




