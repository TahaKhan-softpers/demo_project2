@extends('frontend.layouts.default')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row justify-content-center">
                    <div class="jumbotron">

                        @if(Auth::user()->role=="ADMIN")
                            <h1>This is All User Page</h1>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">User</th>
                                    <th scope="col">User Email</th>
                                    <th scope="col">Post</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($user as $users)
                                    @if(isset($users->posts))
                                        @foreach($users->posts as $post)
                                            @foreach($post->comments as $comment)
                                            <tr>
                                                <td>{{$users->name}}</td>
                                                <td>{{$users->email}}</td>
                                                <td>{{$post->title}}</td>

                                                <td>{{$comment->description}}</td>


                                                <td><a role="button" class="btn btn-primary"
                                                       href="{{url('post/show/'.$users->id)}}">Show Post</a>
                                                    <a role="button" class="btn btn-secondary" href="#">Delete</a></td>
                                            </tr>
                                            @endforeach
                                        @endforeach
                                    @endif
                                @endforeach

                                </tbody>
                            </table>
                        @else
                            <h1>Are you new here? </h1>
                            <p>Please use the <a type="button" href="{{url('post/')}}">post page</a> to create post if
                                you dont have post.<b>Its that easy!</b></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
