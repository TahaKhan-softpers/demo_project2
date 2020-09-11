@extends('frontend.layouts.default')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="jumbotron rounded-0">
                    <h1>EDIT POST PAGE</h1>
                    <form action="{{url('post/update/'.$edit->id)}}" method="POST" enctype="multipart/form-data" >
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="emailHelp" value="{{$edit->title}}" name="title" >
                            @error('title')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            @error('description')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <textarea class="form-control @error('description') is-invalid @enderror " id="description" cols="30" rows="10" name="description">{{$edit->description}}</textarea>


                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1" class="@error('image_upload') is-invalid @enderror">Image file input</label>

                                <p><input type="file" class="form-control-file" id="imageInp" name="image_upload"/></p>
                                <p><img id="imageDisplay" class="col-3 form-control-file" src="@if($edit->image->name) asset('assets/img/'.$edit->image->name) @else # @endif" alt="your image" /></p>


{{--                            <label><img class="col-3 " src="{{asset('assets/img/'.$edit->image->name)}}"></label>--}}
{{--                            <input type="file" class="form-control-file " id="exampleFormControlFile1 " name="image_upload" >--}}
                            @error('image_upload')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

