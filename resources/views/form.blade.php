
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 7 Ajax Request example - codechief.org </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>

<div class="container">
    <h1>Laravel 7 Ajax Request example - codechief.org</h1>

    <form >

        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Name" required="">
        </div>

        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required="">
        </div>

        <div class="form-group">
            <strong>Email:</strong>
            <input type="email" name="email" class="form-control" placeholder="Email" required="">
        </div>
        <div class="form-group">
            <strong>Role:</strong>
            <select  name="role" class="form-control"  required="">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-success btn-submit">Submit</button>
        </div>

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
<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").click(function(e){

        e.preventDefault();

        var name = $("input[name=name]").val();
        var password = $("input[name=password]").val();
        var email = $("input[name=email]").val();
        var role = $("input[name=role]").val();

        $.ajax({
            type:'POST',
            url:"{{ route('user.create') }}",
            data:{name:name, password:password, email:email , role:role},
            success:function(data){
                alert(data.success);
            }
        });

    });
</script>

</html>
