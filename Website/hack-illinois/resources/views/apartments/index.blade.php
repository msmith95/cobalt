@extends('layouts.app')

@section('pageStylesheet')
<link rel="stylesheet" href="css/apartments.css">
@endsection

@section('content')

<div class="container-fluid apartmentsContainer">
    <div class="container innerContainer">
        <h2 class="text-center">Apartment Registration</h2>
        <br>
        <div class="row">

            <div class="col-md-4 col-md-offset-1 text-center">
                <div class="well well-lg">
                    <h3>Select Existing Apartment</h3>
                    <br>
                    <input type="text" class="form-control" placeholder="Apartment Name">
                    <div class="lead">or</div>
                    <input type="text" class="form-control" placeholder="Apartment ID">
                    <br>
                    <button type="button" class="form-control" class="btn btn-default">Submit</button>
                </div>

            </div>
            <div class="col-md-4 col-md-offset-2 text-center">
                <div class="well well-lg">
                    <h3>Create New Apartment</h3>
                    <br>
                    <input type="text" class="form-control" placeholder="Apartment Name">
                    <br>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Add Roomates (email)">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Add</button>
                      </span>
                    </div>
                    <div class="roomatesToAdd"></div>
                    <br>
                    <button type="button" class="form-control" class="btn btn-default">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection









