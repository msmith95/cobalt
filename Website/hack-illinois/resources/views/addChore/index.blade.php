@extends('layouts.app')

@section('pageStylesheet')
<link rel="stylesheet" href="css/addChore.css">
@endsection

@section('content')

<div class="container-fluid mainContainer">
    <div class="container innerContainer">
        <!-- <h2 class="text-center">Features</h2> -->
        <div class="well well-lg">
            <input type="text" class="form-control" placeholder="Chore Name">
            <br>
            <input type="text" class="form-control" placeholder="Chore Description">
            <div class="interval center-block">
                <div class="lead text-center">
                    Please Select the Days for the Chore.
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">Monday</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">Tuesday</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">Wednesday</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">Thursday</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">Friday</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">Saturday</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">Sunday</label>
                </div>
            </div>
            <button type="submit" class="form-control" class="btn btn-default">Submit</button>
        </div>
    </div>
</div>
@endsection