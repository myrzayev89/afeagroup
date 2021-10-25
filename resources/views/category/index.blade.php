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
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->title }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', ['id' => $category->id]) }}">edit</a>&nbsp;
                                        <a href="{{ route('category.destroy', ['id' => $category->id]) }}" onclick="event.preventDefault();document.getElementById('delete').submit();">delete</a>
                                        <form action="{{ route('category.destroy', ['id' => $category->id]) }}" id="delete" method="POST">
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
