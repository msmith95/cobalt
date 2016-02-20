@extends('layouts.app')

@section('pageStylesheet')
<link rel="stylesheet" href="css/landing.css">
@endsection

@section('content')


<div class="headerImage text-center">
    <img class="img-responsive" src="assets/cobalt_logo_large.png" alt="Cobalt" width="500" height="500">
</div>
<div class="headerImageFooter">
    <div class="row">
        <div class="container">
            <div class="col-md-4 text-center headerFooterTitle"><div class="lead">Useful</div></div>
            <div class="col-md-4 text-center headerFooterTitle"><div class="lead">Simple</div></div>
            <div class="col-md-4 text-center headerFooterTitle"><div class="lead">Cheap</div></div>
        </div>
    </div>
</div>
<div class="container-fluid landingContainer">
    <div class="container innerContainer">
        <!-- <h2 class="text-center">Features</h2> -->
        <div class="row">
            <div class="col-md-4 text-center">
                <!-- <div class="lead">Useful</div> -->
                <div class="lead smallLead">Track your chores</div>
                <div class="lead smallLead">Keep roomates accountable</div>
                <div class="lead smallLead">No more dirty dishes!</div>
            </div>
            <div class="col-md-4 text-center">
                <!-- <div class="lead">Simple</div> -->
                <div class="lead smallLead">Create custom Chores</div>
                <div class="lead smallLead">Choose when you get notifications</div>
                <div class="lead smallLead">Easy to use mobile app</div>
            </div>
            <div class="col-md-4 text-center">
                <!-- <div class="lead">Cheap</div> -->
                <div class="lead smallLead">$17.38</div>
                <div class="lead smallLead">per Roommate</div>
                <div class="lead smallLead">per Year</div>
            </div>

        </div>
    </div>
</div>
@endsection