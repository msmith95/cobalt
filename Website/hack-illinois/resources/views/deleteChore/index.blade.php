@extends('layouts.app')

@section('pageStylesheet')
<link rel="stylesheet" href="css/landing.css">
@endsection

@section('content')
<div class="container-fluid landingContainer">
    <div class="container innerContainer">
        <h2 class="text-center">Delete Chores</h2>
        <br>
        <ul>
       @if (count($chores)>0)
       @foreach ($chores as $chore)
            <div class="row">
                <div class="col-md-6">
                    <p>{{ $chore->name }}</p>
                </div>
                <div class="col-md-6">
                    <a href="/deleteChore/{{ $chore->id }}" class="btn btn-danger">Delete Chore</a>
                </div>
            </div>
            <hr>
       @endforeach
       @endif
       </ul>
        </div>
    </div>
</div>
@endsection