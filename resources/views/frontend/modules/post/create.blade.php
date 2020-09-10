@extends('frontend.layouts.default')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="jumbotron rounded-0">
                    <h1>CREATE POST PAGE</h1>
                    <form action="{{url('/post/store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title')invalid-feedback @enderror" id="title" aria-describedby="emailHelp" name="title">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea class="form-control" cols="30" rows="10" name="description"></textarea>
{{--                            <input type="text" class="form-control" id="exampleInputPassword1" name="description">--}}
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Image file input</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image_upload">
                        </div>
                        <input type="text" hidden name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

