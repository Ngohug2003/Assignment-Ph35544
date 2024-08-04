@extends('layouts.admin.master')
@section('title', 'Thêm tin ')
@section('content')
    <div class="container">
        <h1>Thêm tin tức</h1>
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($category as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="short_description">Short Description</label>
                <input type="text" name="short_description" class="form-control" value="{{ old('short_description') }}">
                @error('short_description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control">{{ old('content') }}</textarea>
                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="img_url">Image</label>
                <input type="file" name="img_url" class="form-control">
                @error('img_url')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Create Post</button>
        </form>
    </div>
@endsection
