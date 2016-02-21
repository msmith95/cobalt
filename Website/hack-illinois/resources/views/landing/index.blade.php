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
        <h1 class="text-center">Features</h1>
        <br>
        <div class="row">
            <div class="col-md-6 text-center">
                <!-- <div class="lead">Useful</div> -->
                <div class="lead smallLead">Cobalt is a chore organizing service that is directed towards apartments and roommates.</div>
                <div class="lead smallLead">Users add custom chores with preset intervals: daily, every other day, bi-weekly, weekly and monthly.</div>
                <div class="lead smallLead">Notifications are pushed to roommates through the mobile app, alerting them when they are assigned a chore</div>
            </div>
            <div class="col-md-6 text-center">
                <!-- <div class="lead">Simple</div> -->
                <div class="lead smallLead">Roomates have the ability to see whose turn it is to do a chore (users are recommended to make sure assigned chores get done on time for maximum effectiveness).</div>
                <div class="lead smallLead">When a user completes a chore, they simply click the chore complete button either on the mobile app or online.</div>
                <div class="lead smallLead">Cobalt strives to make chores evenly spaced out in time and between roommate, </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="lead smallLead">Cobalt strives to make chores evenly spaced out in time and between roommate, implementation of this app ensures that no user feels they are doing more work than the rest!</div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <p class-"footer">This application was developed by Michael Smith Jr, Reiker Seiffe, John Carmichael, and Maison Flint from the University of Missouri - Columbia</p>
</div>
@endsection