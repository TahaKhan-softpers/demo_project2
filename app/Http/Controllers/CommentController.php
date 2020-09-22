<?php

namespace App\Http\Controllers;


use App\Http\Requests\CommentCreate;
use App\Http\Requests\CommentUpdate;
use App\Notifications\Commented;
use App\Services\CommentService;

use App\Services\PostService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CommentController extends Controller
{
    protected $commentService, $postService, $userService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(CommentService $commentService, PostService $postService, UserService $userService)
    {
        $this->commentService = $commentService;
        $this->postService = $postService;
        $this->userService = $userService;
    }

    public function index()
    {
        $comment = $this->commentService->show();
        return view('frontend.modules.comment.comment', compact('comment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentCreate $request)
    {
        $request->validated();
        DB::beginTransaction();
        try {
            $comment = $this->commentService->create($request);
            DB::commit();
            $post = $this->postService->find($request->post_id);
            $owner = $post->user;
            $owner->notify(new Commented($comment));
            return redirect('/post/show/' . $request->post_id);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('post/show/' . $request->post_id)->with('message', 'this is error' . $e . '<br>');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentUpdate $request, $id)
    {
//        $request->validate([
//            'post_id' => 'required',
//            'user_id' => 'required',
//            'description' => 'required|max:255',
//        ]);

        $request->validated();
        DB::transaction();
        try {
            $this->commentService->create($request);
            DB::commit();
            return redirect('/post/show/' . $request->post_id);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('post/show/' . $request->post_id)->with('message', 'this is error' . $e . '<br>');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param array $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->commentService->delete($id);

        return redirect()->back();
    }
}
