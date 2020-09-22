<?php

namespace App\Http\Controllers;


use App\Http\Requests\PostCreate;
use App\Http\Requests\PostUpdate;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Services\PostService;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;


class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $post = $this->postService->show();

        return view('frontend.modules.post.post', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/frontend/modules/post/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreate $request)
    {
//        $request->validate([
//            'title' => 'required|max:255',
//            'description' => 'required|string',
//            'image_upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);

        //$request->image="image";
        $request->validated();
        DB::beginTransaction();
        try {
            $this->postService->create($request);
            DB::commit();
            return redirect('/post')->with('message', 'post uploaded!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/post')->with('message', 'this is error  <br> ' . $e . '/');
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
        $post = $this->postService->find($id);
        return view('frontend.modules.post.post_detail', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = $this->postService->edit($id);

        return view('frontend.modules.post.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdate $request, $id)
    {
//        $request->validate([
//            'title' => 'required|max:255',
//            'description' => 'required',
//            'image_upload' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);
        $request->validated();
        DB::Begintransaction();
        try {
            $this->postService->update($request, $id);
            DB::commit();
            return redirect('post/show/' . $id)->with('message', 'Post Edited!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/post/show/' . $id)->with('message', 'Post Error' . $e . '<br>');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->postService->delete($id);
        return redirect()->back()->with('message', 'post deleted success fully!');

    }
}
