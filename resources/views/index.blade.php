@extends('layouts.main')
@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-title">Salam {{ Auth::user()->username }}</div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout').submit();">Cixis</a>
                <form id="logout" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
                <div class="card-body">
                    sadad
                </div>
            </div>
        </div>
    </div>
@endsection
