<?php

namespace App\Http\Controllers\categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Database\Factories\PostFactory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post= Post::with('category')->get();
        return view('pages.admin.post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('pages.admin.post.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {

        if ($request->hasFile('img_url')) {
            $imgPath = $request->file('img_url')->store('images', 'public');
        } else {  
            $imgPath = null;
        }        
        Post::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'short_description' => $request->short_description,
            'content' => $request->content,
            'img_url' => $imgPath,
        ]);

        return redirect()->route('post.index')->with('success', 'Thêm thành công !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('pages.admin.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        try {
            $post = Post::findOrFail($id);
            $imgPath = $post->img_url;
            if ($request->file('img_url')) {
                if ($post->img_url) {
                    Storage::delete('public/' . $post->img_url);
                }
                $imgPath = $request->file('img_url')->store('images', 'public');
            }
            $post->update([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'short_description' => $request->short_description,
                'content' => $request->content,
                'img_url' => $imgPath,
            ]);
            return redirect()->route('post.edit', $post->id)->with('success', 'Update sản phẩm thành công');
        } catch (Exception $exception) {
            return redirect()->route('post.index')->with('error', 'Có lỗi xảy ra: ' . $exception->getMessage());
        }
      

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = post::find($id);
        if ($post) {
            $post->delete();
            return redirect()->route('post.index')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->route('post.index')->with('error', 'post không tồn tại!');
        }
    }
}
