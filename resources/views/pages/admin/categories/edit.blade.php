@extends('layouts.admin.master')
@section('title', 'Chỉnh sửa loại tin')
@section('content')
    @if (session()->has('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                alert("{{ session('error') }}");
            });
        </script>
    @endif

    @if (session()->has('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                alert("{{ session('success') }}");
            });
        </script>
    @endif

    <div class="container">
        <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $category->name) }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug"
                            value="{{ old('slug', $category->slug) }}">
                        @error('slug')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12 text-right mt-3">
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Quay lại</a>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
