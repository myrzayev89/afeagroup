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
                <h1>{{ $tag->title }}</h1>
                <form action="{{ route('tag.update', ['id' => $tag->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Category Name</label>
                            <input type="text" name="title" value="{{ $tag->title }}" class="form-control @error('name') is-invalid @enderror" id="title">
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
