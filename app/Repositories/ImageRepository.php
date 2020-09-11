<?php

namespace App\Repositories;

//use Illuminate\Http\Request;
use App\Models\Image;

class ImageRepository
{
    /**
     * @Var Image
     *
     *
     */
    protected $image;
    /**
     *
     * @param Image $image
     *
     */
    public function  __construct(Image $image)
    {
        $this->image = $image;
    }
   // new image store
   public function create($result){

       $this->image->create($result);
   }

   //show only one image for edit
   public function edit($id){

       return $this->image->find($id);
   }

   // show individual image based on id
   public function find($id){
       return  $this->image->where('id',$id)->get();
   }
   // show all image.
   public function show(){
        return $this->image->all();
   }
   //to delete image
   public function delete($id){
        $this->image->find($id)->delete();
   }
   //to update image
   public function update($request, $id){
        //echo $request."<br>".$id;

       $this->image->where('post_id',$id)->update($request);
   }
   public function postImage($id){
        //this is post id
        return $this->image->where('post_id',$id)->first();
   }



}
