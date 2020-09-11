<?php

namespace App\Http\Controllers;


use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CommentController extends Controller
{
    protected $commentService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
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
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required',
            'user_id' => 'required',
            'description' => 'required|max:255',
        ]);

        DB::beginTransaction();
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'post_id' => 'required',
            'user_id' => 'required',
            'description' => 'required|max:255',
        ]);

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
