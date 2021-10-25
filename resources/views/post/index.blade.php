@extends('layouts.main')
@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Category name</th>
                                <th>Tags</th>
                                <th>Title</th>
                                <th>Desc</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->getCatName($post->category_id) }}</td>
                                    <td>{{ $post->tags()->pluck('title')->join(', ') }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->desc }}</td>
                                    <td>
                                        <a href="{{ route('post.edit', ['id' => $post->id]) }}">edit</a>&nbsp;
                                        <a href="{{ route('post.destroy', ['id' => $post->id]) }}" onclick="event.preventDefault();document.getElementById('delete').submit();">delete</a>
                                        <form action="{{ route('post.destroy', ['id' => $post->id]) }}" id="delete" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
