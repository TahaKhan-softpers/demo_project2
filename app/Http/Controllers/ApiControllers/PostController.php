<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class PostController extends Controller
{
    protected $postService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        Log::info('here');
        Log::info(Auth::id());
        //auth('api')->user());
       // return dd(Auth::user());
//        if (!Auth::user()->tokenCan('show:all')) {
//            return response('invalid token', 401);
//        } else {
            return new Paginator(PostResource::collection($this->postService->show()), 10);
//        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|',
            'image_upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //$request->image="image";
        DB::beginTransaction();
        try {
            $this->postService->create($request);
            DB::commit();
            return response('created post', 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response('could not create post ', 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        return new PostResource($this->postService->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        return new PostResource($this->postService->edit($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image_upload' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        DB::Begintransaction();
        try {
            $this->postService->update($request, $id);
            DB::commit();
            return response('updated post', 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response('update failed', 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        $this->postService->delete($id);
        return response('deleted file');
    }
}
