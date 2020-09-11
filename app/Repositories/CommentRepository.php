<?php

namespace App\Repositories;

//use Illuminate\Http\Request;
use App\Models\Comment;


class CommentRepository
{
    /**
     * @Var Post
     *
     *
     */
    protected $comment;

    /**
     *
     * @param Comment $commment
     *
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    // new comment store
    public function create($result)
    {

        $this->comment->create($result);
    }

    //show only one comment for edit
    public function edit($id)
    {

        return $this->comment->find($id);
    }

    // find comment based on id
    public function find($id)
    {

        return $this->comment->where('id', $id)->get();

    }

    // show all comments.
    public function show()
    {

        return $this->comment->with('post', 'user')->get();

    }

    //to delete comment
    public function delete($id)
    {
        $this->comment->find($id)->delete();
    }

    //to update comment
    public function update($request, $id)
    {
        $this->comment->find($id)->update($request);
    }


}
