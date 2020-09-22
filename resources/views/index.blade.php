<!DOCTYPE html>

{{--this page is for testing different outputs not for proper display --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name=" viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>this is main page</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/bootstrap-4.5.2-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fontawesome-free-5.14.0-web/css/all.css')}}">

</head>
<body>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="jumbotron rounded-0">
                <h1>ALL POST</h1>
                <div class="row row-cols-1 row-cols-md-2 " id="card-main-post">
{{--                    <div class="col mb-4 ">--}}
{{--                        <div class="card">--}}
{{--                            <img src="" class="card-img-top" alt="No image to show">--}}
{{--                            <div class="card-body">--}}
{{--                                <h5 class="card-title"> this is title</h5>--}}
{{--                                <div class="jumbotron">--}}
{{--                                    <p class="card-text">This is text</p>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
                </div>
                <div class="row">

                    <div class="col-12">
                        <p>If no Post found would you like to create post?</p>
                    </div>
                    <div class="col-12">
                        {{--                            <a class="btn btn-primary btn-lg btn-block" role="button" href="{{url('post/create')}}">CREATE--}}
                        {{--                                POST</a>--}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- this is where script area starts================================================================ -->
<!-- <script type="text/javascript" src="assets/js/jquerymain.js"></script>
<script type="text/javascript" src="assets/bootstrap-4.5.2-dist/js/bootstrap.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $.ajax({    //create an ajax request to display.php
            type: "GET",
            url: "http://127.0.0.1:8000/api/post",
            dataType: "json",   //expect html to be returned
            headers: {
                "Authorization": 'bearer',
            },
            success: function (response) {

                var items = [];
                $.each(response.data, function (key, val) {
                    items.push('<div class="col mb-4 " ><div class="card">');
                    if (val.image != null) {
                        items.push('<img src="' + val.image + '" class="card-img-top" alt="No image to show">');
                    }
                    // src('public/assets/img/'+val.image.name+);
                    items.push('<div class="card-body">' +
                        '<h5 class="card-title">' + val.title + '</h5>' +
                        '<div class="jumbotron">' +
                        '<p class="card-text">' + val.description + '</p>' +
                        '</div>' + '</div><div class="card-body">' +
                        '</div> </div> </div>');

                    console.log(items);
                    // items = items.join();
                    // $("img").attr("src", "{{--asset('/assets/img')--}}");
                    // $("#card-main-post").append(items);
                    //$("<div/>", {"class": "card-main-post", html: items.join("")}).appendTo("body");

                    //$(".my-post-list").html(data);
                    //alert(response);
                });
                items = items.join("");
                $("#card-main-post").append(items);
            }
        });
    });

</script>
</body>
</html>

