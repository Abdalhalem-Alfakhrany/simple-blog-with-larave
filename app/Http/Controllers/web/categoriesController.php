<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class categoriesController extends Controller
{
    protected $navcategories = [];
    public function __constructor()
    {
        $this->navcategories = Category::all(['id', 'title']);
    }

    public function index()
    {

        $CategoriesWithPosts = [];

        $AllCategories = Category::all();

        foreach ($AllCategories as $category) {
            $CategoryWithPosts = [];

            $CategoryWithPosts['category'] = $category;
            $CategoryWithPosts['posts'] = Post::where('category', $category['id'])->limit(10)->get(['title', 'sub_title', 'body', 'img']);
            array_push($CategoriesWithPosts, $CategoryWithPosts);
        }

        // return $data;

        return view('categories.categories',  ['CategoriesWithPosts' => $CategoriesWithPosts, 'navCategories' => $this->navCategories]);
    }

    public function show($category)
    {
        $posts = Post::where('category', $category)->paginate(10);
        // return $posts;
        return view('categories.category', ['posts' => $posts, 'navCategories' => $this->navCategories]);
    }

    public function create()
    {
        return view('categories.createcategory');
    }

    public function store()
    {
        return redirect(route('index'));
    }
}
