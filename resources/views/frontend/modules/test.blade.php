<!-- <!DOCTYPE html>
<html>
<head>
	<title>this is testing page</title>
</head>
<body>
<div style="height: 100px; width: 600px; padding: 20px; background-color: lightgreen; color: grey; font-size: 40px; font-family: calibri;">
<p>	This is Testing </p>
<table border="4px" style="padding: 3px;">
<tr><th>Id</th><th>First Name</th><th>Last Name</th><th>Password</th><th>Gender</th><th>Address</th></tr>
{{-- @foreach ($U as $user) --}}
    <tr>
    <td>{{-- $user->id --}}</td>
<td>{{-- $user->U_First_Name --}}</td>
<td>{{-- $user->U_Last_Name --}}</td>
<td>{{-- $user->U_Password --}}</td>
<td>{{-- $user->U_Gender --}}</td>
<td>{{-- $user->U_Address --}}</td>
</tr>
{{-- @endforeach --}}
    </table>



<?php
// print_r($U);
// print_r($U[0]['U_First_Name']);
// print_r($U[0]['U_Last_Name']);
// print_r($U[1]['U_First_Name']);
// print_r($U[1]['U_Last_Name']);
// print_r($U[2]['U_First_Name']);
// print_r($U[2]['U_Last_Name']);

// echo $data->U_Last_Name;
// echo $data->U_Email;
// echo $data->U_Address;
// echo $data->U_Gender;
?>

    </div>
    </body>
    </html>
-->


<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

{{--<div class="w3-container">--}}

{{--	@if ($message = Session::get('success'))--}}
{{--    <div class="w3-panel w3-green w3-display-container">--}}
{{--        <span onclick="this.parentElement.style.display='none'"--}}
{{--                class="w3-button w3-green w3-large w3-display-topright">&times;</span>--}}
{{--        <p>{!! $message !!}</p>--}}
{{--    </div>--}}
{{--    <?php Session::forget('success');?>--}}
{{--    @endif--}}
{{--    @if ($message = Session::get('error'))--}}
{{--    <div class="w3-panel w3-red w3-display-container">--}}
{{--        <span onclick="this.parentElement.style.display='none'"--}}
{{--                class="w3-button w3-red w3-large w3-display-topright">&times;</span>--}}
{{--        <p>{!! $message !!}</p>--}}
{{--    </div>--}}
{{--    <?php Session::forget('error');?>--}}
{{--@endif--}}

{{-- <form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="{!! URL::to('paypal') !!}">--}}
{{--  {{ csrf_field() }}--}}
{{--  <h2 class="w3-text-blue">Payment Form</h2>--}}
{{--  <p>Demo PayPal form - Integrating paypal in laravel</p>--}}
{{--  <p>      --}}
{{--  <label class="w3-text-blue"><b>Enter Amount</b></label>--}}
{{--  <input class="w3-input w3-border" name="amount" type="text"></p>      --}}
{{--  <button class="w3-btn w3-blue">Pay with PayPal</button></p>--}}
{{--</form>--}}
{{--</div>--}}

<div>

    {{--    {{$user}}--}}
    {{--    {{$user = json_encode($user)}}--}}
    {{--    {{$user}}--}}
    {{--    <script>--}}
    {{--        var xmlhttp = new XMLHttpRequest();--}}
    {{--        xmlhttp.onreadystatechange = function() {--}}
    {{--            if (this.readyState == 4 && this.status == 200) {--}}
    {{--                var myObj = JSON.parse(this.responseText);--}}
    {{--                document.getElementById("demo").innerHTML = myObj.name;--}}
    {{--            }--}}
    {{--        };--}}
    {{--        xmlhttp.open("GET", "json_demo.txt", true);--}}
    {{--        xmlhttp.send();--}}
    {{--    </script>--}}
    {{--    <li *ngFor="let obj of myArray">{{$user | $user.name}}</li>--}}
    <div class="my-post-list"></div>


    <div id="demo">This is Test Page</div>
    <button id="btn">Click</button>

</div>


</body>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script>
    // $.getJSON("http://127.0.0.1:8000/api/post", function(data){
    //             var items = [];
    //             $.each(data , function (key , val){
    //                 items.push( "<div id='" + key + "'>" + val.title + "</div>");
    //             });
    //     $("<div/>", {"class": "my-post-list",html: items.join("") }).appendTo("body");
    // });
    // $.ajax({
    //     url: "http://127.0.0.1:8000/api/post",
    //     cache: false,
    //     authorization("17|G3qkaMNPwRxy9jv6AQMr8Poh2joeA6wRN8v2NEAQ"),
    //     success: function(html){
    //         $("#results").append(html);
    //     }
    //
    // });
    // $.ajax({
    //     type: 'GET',
    //     url: 'http://127.0.0.1:8000/api/post',
    //     data: {
    //         'q': queryString,
    //         'response-format': "jsonp",
    //         'api-key': '17|G3qkaMNPwRxy9jv6AQMr8Poh2joeA6wRN8v2NEAQ',
    //     },
    //     success: function(data) {
    //         // passed function object for data processing
    //         console.log(data);
    //     },
    //     error: function(err) {
    //         console.log('error:' + err)
    //     }
    // });
    $(document).ready(function () {
        $('#btn').on('click', function() {
            console.log('here');
            const token = {{}}

            $.ajax({    //create an ajax request to display.php
                type: "GET",
                url: "http://127.0.0.1:8000/api/post",
                dataType: "json",   //expect html to be returned
                headers: {
                    "Authorization": 'Bearer '{{\Illuminate\Support\Facades\Cookie::get('authUser')}};
                },
                success: function (response) {
                    var items = [];
                    $.each(response.data, function (key, val) {
                        items.push("<div id='" +val.id +"_"+ key + "'>" + val.title + "</div>");

                    });
                    console.log(items);
                    $("<div/>", {"class": "my-post-list", html: items.join("")}).appendTo("body");
                    //$(".my-post-list").html(data);
                    //alert(response);
                }

            });
        });
    });
</script>
</html>

