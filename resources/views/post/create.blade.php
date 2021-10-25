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
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="image">Select Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="categoryId">Select Category</label>
                            <select name="category_id" id="categoryId" class="form-control">
                                @foreach($categories as $k => $v)
                                    <option value="">Select</option>
                                    <option value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tagId">Select Tag</label>
                            <select name="tags[]" class="form-select" multiple>
                                @foreach($tags as $k => $v)
                                    <option value="">Select</option>
                                    <option value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Post Name</label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                   class="form-control @error('name') is-invalid @enderror" id="title">
                        </div>
                        <div class="form-group">
                            <label for="desc">Post Desc</label>
                            <input type="text" name="desc" value="{{ old('desc') }}"
                                   class="form-control @error('desc') is-invalid @enderror" id="desc">
                        </div>
                        <div class="form-group">
                            <label for="content">Tag Name</label>
                            <textarea name="content" id="content" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
