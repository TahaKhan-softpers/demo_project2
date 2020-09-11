@extends('frontend.layouts.default')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="jumbotron rounded-0">
                    <h1>ALL POST</h1>
                    <div class="row row-cols-1 row-cols-md-2">
                        @foreach($post as $data)
                            @if(isset($data->image->name)&& ( $data->user->email==Auth::user()->email || ("ADMIN"==Auth::user()->role)) )

                                <div class="col mb-4">
                                    <div class="card">
                                        <img src="{{asset('assets/img/'.$data->image->name)}}" class="card-img-top"
                                             alt="No image to show">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$data->title}}</h5>
                                            <div class="jumbotron">
                                                <p class="card-text">{{$data->description}}</p>
                                            </div>

                                        </div>
                                        <div class="card-body">

                                            <a class="btn btn-primary" role="button"
                                               href="{{url('post/show/'.$data->id)}}">DETAIL POST</a>

                                            {{--                                    @if( Auth::user()->email==$data->user->email||Auth::user()->role="ADMIN")--}}
                                            <a class="btn btn-primary" role="button"
                                               href="{{url('post/edit/'.$data->id)}}">EDIT POST</a>
                                            <a onclick="return alert('are you sure?')"
                                               href="{{url('post/delete/'.$data->id)}}" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i> Delete post :(</a>
                                            {{--                                    @endif--}}
                                        </div>
                                    </div>

                                </div>
                            @endif
                        @endforeach

                    </div>
                    <div class="row">

                        <div class="col-12">
                            <p>If no Post found would you like to create post?</p>
                        </div>
                        <div class="col-12">
                            <a class="btn btn-primary btn-lg btn-block" role="button" href="{{url('post/create')}}">CREATE
                                POST</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

