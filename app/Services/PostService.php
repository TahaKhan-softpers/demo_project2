<?php


namespace App\Services;

use App\Repositories\PostRepository;
use App\Services\ImageService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class PostService
{
    protected $postRepositary;
    protected $imageService;

    public function __construct(PostRepository $postRepository, ImageService $imageService)
    {
        $this->postRepository = $postRepository;
        $this->imageService = $imageService;
    }

    public function show()
    {
        return $this->postRepository->show();
    }

    public function edit($id)
    {

        return $this->postRepository->edit($id);
    }

    public function create($request)
    {
        //this is create function
        $request->title = Str::upper($request->title);
        $post = $this->postRepository->create($request->all());
        $name = $this->fileUpload($request);
        $request['post_id'] = $post->id;
        $request['name'] = $name;
        $this->imageService->create($request);

    }

    public function update($request, $id)
    {
        //update function
        $this->postRepository->update($request->all(), $id);
        if (isset($request->image_upload)) {
            //to fetch image
            $image = $this->imageService->deleteFromfolder($request->id);
            //delete image here
            $this->deleteImage($image);

            $random['name'] = $this->fileUpload($request);
            $random['post_id'] = $id;
            $this->imageService->update($random, $id);

        } else {

            $request['post_id'] = $id;
            $this->imageService->update($request->except('_token', 'title', 'description'), $id);
        }
    }

    public function find($id)
    {
        return $this->postRepository->find($id);
    }

    public function delete($id)
    {
        //to fetch image
        $image = $this->imageService->deletefromfolder($id);
        //delete image here
        $this->deleteimage($image);
        $this->postRepository->delete($id);
    }

    public function deleteImage($image)
    {
        //code to delete image from folder
        $image_path = "assets/img/" . $image->name;  // Value is not URL but directory file path
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
    }


    public function fileUpload($request)
    {


        if ($request->hasFile('image_upload')) {
            $image = $request->file('image_upload');
            $name = time() . '_upload' . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/assets/img');
            $image->move($destinationPath, $name);
            return $name;
            //$this->save();
            //return back()->with('success','Image Upload successfully');
        }

    }
}
