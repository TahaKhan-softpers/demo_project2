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
                            <input type="text" class="form-control @error('title')invalid-feedback @enderror" id="title"
                                   aria-describedby="emailHelp" name="title">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea class="form-control" cols="30" rows="10" name="description"></textarea>
                        </div>
                        <div class="form-group">
                        <label for="exampleFormControlFile1">Image file input</label>

                        <p><input type='file' class="form-control-file" id="imageInp" name="image_upload"/></p>
                        <p><img id="imageDisplay" class="col-3 form-control-file" src="#" alt="your image"/></p>
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

