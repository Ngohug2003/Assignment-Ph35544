@extends('layouts.admin.master')
@section('title', 'Trang update')
@section('content')
    <div class="container">
        <h1>Trang update</h1>
        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="short_description">Short Description</label>
                <input type="text" name="short_description" class="form-control" value="{{ $post->short_description }}">
                @error('short_description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control">{{ $post->content }}</textarea>
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
                @if ($post->img_url)
                    <img src="{{ asset('storage/' . $post->img_url) }}" alt="Image" width="100">
                @endif
            </div>
           <a class="btn btn-secondary" href="{{route('post.index')}}">Quay lại</a>
            <button type="submit" class="btn btn-success">Update Post</button>
        </form>
    </div>
@endsection
