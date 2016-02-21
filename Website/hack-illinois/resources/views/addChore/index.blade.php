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
            <div class="interval">
                <input type="date" class="form-control" name="dueDate">
                    <select>
                      <option value="Daily">Daily</option>
                      <option value="Bi-Weekly">Bi-Weekly</option>s
                      <option value="Weekly">Weekly</option>
                      <option value="Bi-Monthly">Bi-Monthly</option>
                      <option value="Monthly">Monthly</option>
                    </select>
            </div>
            <button type="submit" class="form-control" class="btn btn-default">Submit</button>
        </div>
    </div>
</div>
@endsection