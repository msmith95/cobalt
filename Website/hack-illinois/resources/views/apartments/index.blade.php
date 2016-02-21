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
                    <form action="/joinApartment" method="POST">
                        {!! csrf_field() !!}
                        <input type="text" class="form-control" placeholder="Apartment ID" name="apt-id">
                        <br>
                        <button type="submit" class="form-control" class="btn btn-default">Submit</button>
                    </form>
                </div>

            </div>
            <div class="col-md-4 col-md-offset-2 text-center">
                <div class="well well-lg">
                    <h3>Create New Apartment</h3>
                    <br>
                    <form action="/createApartment" method="POST">
                        {!! csrf_field() !!}
                        <input type="text" class="form-control" placeholder="Apartment Name" name="name">
                        <br>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Add Roomates (email)" name='roommates[]'>
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Add</button>
                          </span>
                        </div>
                        <div class="roomatesToAdd"></div>
                        <br>
                        <button type="submit" class="form-control" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection









