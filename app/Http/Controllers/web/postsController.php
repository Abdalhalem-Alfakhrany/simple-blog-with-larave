<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use GuzzleHttp\Psr7\Request;

class postsController extends Controller
{
    protected $navcategories = [];
    public function __constructor()
    {
        $this->navcategories = Category::all(['id', 'title']);
    }

    public function index($post)
    {
        $post = Post::where('id', $post)->get(['title', 'body', 'img'])->first();
        // return $data;
        return view('posts.post', ['post' => $post, 'navCategories' => $this->navCategories]);
    }
    public function create()
    {
        $categories = Category::all(['id', 'title']);
        // return $categories;
        return view(
            'posts.createpost',
            // ['categories', $categories]);
            compact('categories')
        );
    }
    public function store()
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
        return redirect(route('index'));
    }
}
