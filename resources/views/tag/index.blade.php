@extends('layouts.main')
@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Cat Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{ $tag->title }}</td>
                                    <td>
                                        <a href="{{ route('tag.edit', ['id' => $tag->id]) }}">edit</a>&nbsp;
                                        <a href="{{ route('tag.destroy', ['id' => $tag->id]) }}" onclick="event.preventDefault();document.getElementById('delete').submit();">delete</a>
                                        <form action="{{ route('tag.destroy', ['id' => $tag->id]) }}" id="delete" method="POST">
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
