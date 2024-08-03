<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
// use GuzzleHttp\Psr7\Request;

use function Ramsey\Uuid\v1;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(6);
        return view('pages.client.home' , compact('posts'));
    }
    public function categoryALl(){
        $postsAll = Post::paginate(10);
        return view('pages.client.categoryAll' , compact('postsAll'));
         // $category = DB::table('categories')->where('id', $id)->first();
        // $posts = DB::table('posts')->where('category_id', $id)->paginate(10);
    }
    public function Category($slug){
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = Post::where('category_id', $category->id)->paginate(10);
        return view('pages.client.category' , compact('category' , 'posts'));
    }
    
  
    public function titleshow($id){
        $posttitle = DB::table('posts')->where('id', $id)->first();
        if ($posttitle) {
            $category = DB::table('categories')->where('id', $posttitle->category_id)->first();
        }
        return view('pages.client.single-post' , compact('posttitle','category'));
    }
    public function search(Request $request){

        $keyword = $request->input('keyword');
        $posts = Post::where('title', 'LIKE', "%{$keyword}%")
            ->paginate(10);
        return view('pages.client.search' ,compact('posts', 'keyword'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StorePostRequest $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdatePostRequest $request, Post $post)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}