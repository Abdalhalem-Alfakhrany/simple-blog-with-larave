<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::paginate(100);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required',
            'sub_title' => 'nullable',
            'body' => 'required',
            'category' => 'required',
            'video_id' => 'nullable',
            'img' => 'image|required',
        ]);

        $filename = time() . '.' . request()->img->getClientOriginalExtension();
        request()->img->storeAs('posts-imgs', $filename, 'public');

        $post = new Post();
        $post->title = $data['title'];
        $post->sub_title = $data['sub_title'];
        $post->category = $data['category'];
        $post->body = $data['body'];
        $post->img =  $filename;
        $post->video_id = $data['video_id'];

        $post->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::where('id', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'title' => 'required',
            'sub_title' => 'nullable',
            'body' => 'required',
            'category' => 'required',
            'video_id' => 'nullable',
            'img' => 'image|required',
        ]);

        $filename = time() . '.' . request()->img->getClientOriginalExtension();
        request()->img->storeAs('posts-imgs', $filename, 'public');

        $post = Post::where('id', $id);
        $post->title = $data['title'];
        $post->sub_title = $data['sub_title'];
        $post->category = $data['category'];
        $post->body = $data['body'];
        $post->img =  $filename;
        $post->video_id = $data['video_id'];

        $post->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id', $id)->delete();
    }
}
