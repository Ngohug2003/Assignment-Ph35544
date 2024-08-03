<?php

namespace App\Http\Controllers\categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('pages.admin.categories.index', compact('categories'));
    }
    public function create()
    {
        return view('pages.admin.categories.create');
    }
    public function store(CategoryRequest $request)
    {
        $categories = $request->input('categories');

        foreach ($categories as $categoryData) {

            Category::create([
                'name' => $categoryData['name'],
                'slug' => $categoryData['slug'],
            ]);
        }


        return redirect()->route('categories.create')->with('success', 'Thêm thành công');
    }

    public function show(string $id)
    {
    }
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('pages.admin.categories.edit', compact('category'));
    }
    public function update(UpdateCategoryRequest $request, string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update([
                'name' => $request->input('name'),
                'slug' => $request->input('slug'),
            ]);
            return redirect()->route('categories.edit', $category->id)->with('success', 'Cập nhật thành công!');
        } catch (Exception $exception) {
            return redirect()->route('categories.index')->with('error', 'Có lỗi xảy ra: ' . $exception->getMessage());
        }
    }
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->route('categories.index')->with('error', 'Category không tồn tại!');
        }
    }
    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
