<?php

namespace App\Repositories;

//use Illuminate\Http\Request;
use App\Models\Post;

class PostRepository
{
    /**
     * @Var Post
     *
     *
     */
    protected $post;

    /**
     *
     * @param Post $post
     *
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    // new post store
    public function create($result)
    {
//        $post = new $this->post;
//
//        $post->title = $result['title'];
//        $post->description= $result['description'];
//        $post->save();
        return $this->post->create($result);
    }

    //show only one record for edit
    public function edit($id)
    {
        //return $this->post->where('id',$id)->get();
        //return $this->post->with('image')->find($id);
        return $this->post->with('image')->find($id);

    }

    // show individual post based on id
    public function find($id)
    {
        return $this->post->find($id);
        //return  $this->post->where('id',$id)->get();
    }

    // show all posts.
    public function show()
    {
        return $this->post->with('image', 'user')->get();
    }

    //to delete post
    public function delete($id)
    {

        $this->post->find($id)->image->delete();
        $this->post->find($id)->delete();
    }

    //to update post
    public function update($request, $id)
    {
        //return $request;
        $this->post->find($id)->update($request);
    }
    //to


}
