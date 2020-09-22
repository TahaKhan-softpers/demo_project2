<?php
?>
<html>
<head>
    <meta charset="UTF-8" >
    <title>This is Forums Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="accept" content="application/json">
</head>
<body>
<div style="width: 600px; height: 300px; margin: 0 auto; background-color: #3f9ae5;">
    <form method="POST" action="{{URL('api/login')}}" >
        @csrf
        <div style="width: 70%; height: 40px; margin: 0 auto;">
            <label>Email</label>
            <input type="text" name="email" required>
        </div>
        <div style="width: 70%; height: 40px; margin: 0 auto;">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <input  value="Submit" id="#submitButton" type="Submit">
    </form>
</div>



</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
{{--<script>--}}
{{--    $.ajaxSetup({--}}
{{--        headers: {--}}
{{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),--}}
{{--        }--}}
{{--    });--}}
{{--    $('#submitButton').on('click', function (e) {--}}
{{--        e.preventDefault(); // Want to stay on the page, not go through normal form--}}
{{--        // Might be easier to make this a NON submit button - then we can use the rest below and not have to js submit()--}}
{{--        // Grab any extra info via data.--}}
{{--        var item_type = $(this).data('item-type');--}}
{{--        var name = $(this).val();--}}
{{--        $.ajax({--}}
{{--            url: "{{url('api/login')}}",--}}
{{--            type: "POST",--}}
{{--            dataType:"json",--}}
{{--            data: {--}}
{{--                item_type: item_type,--}}
{{--                name: name--}}
{{--            },--}}
{{--            success: function (name) {--}}
{{--                alert(message);--}}
{{--                // Or, if you want a better looking alert, you can use a library like SWAL:--}}
{{--                swal("Success!", "User Login with a name of: "+name, "success");--}}
{{--            },--}}
{{--            error: function () {--}}
{{--                swal("Error", "Unable to bring up the dialog.", "error");--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
</html>
