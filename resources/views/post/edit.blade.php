@extends('layouts.main')
@section('content')
    <div class="row mt-4">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="card">
                <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <img src="{{ $post->getImage() }}" width="200" alt="Post Image">
                        </div>
                        <div class="form-group">
                            <label for="image">Select Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="categoryId">Select Category</label>
                            <select name="category_id" id="categoryId" class="form-control">
                                @foreach($categories as $k => $v)
                                    <option @if($k == $post->category_id) selected @endif value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tagId">Select Tag</label>
                            <select name="tags[]" class="form-select" multiple>
                                @foreach($tags as $k => $v)
                                    <option @if(in_array($k, $post->tags->pluck('id')->all())) selected @endif value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Post Name</label>
                            <input type="text" name="title" value="{{ $post->title }}"
                                   class="form-control @error('title') is-invalid @enderror" id="title">
                        </div>
                        <div class="form-group">
                            <label for="desc">Post Desc</label>
                            <input type="text" name="desc" value="{{ $post->desc }}"
                                   class="form-control @error('desc') is-invalid @enderror" id="desc">
                        </div>
                        <div class="form-group">
                            <label for="content">Tag Name</label>
                            <textarea name="content" id="content" class="form-control" rows="5">{{ $post->content }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
