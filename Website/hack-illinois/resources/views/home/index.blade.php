@extends('layouts.app')

@section('pageStylesheet')
<link rel="stylesheet" href="css/home.css">
@endsection

@section('content')

<script>
    function toggler(divID) {
    $("#" + divID).toggle();
}
</script>

<div class="container-fluid mainContainer">
    <div class="container innerContainer">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default text-center">
                      <!-- Default panel contents -->
                      <div class="panel-heading"><h1>Sunday</h1></div>
                      <div class="panel-body">
                        <h1>{{ \Carbon\Carbon::now('America/Chicago')->day }}</h1>
                      </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="list-group">
                    <div class="list-group-item active">
                        Today's Chores
                    </div>

                    @if (count($chores) > 0)
                        @for ($i = 0; $i < count($chores); $i++)
                        <div class="list-group-item">{{ $chores[$i]->name }}
                            <div class="listButtons">
                                <button type="button" class="btn btn-default" onclick="toggler('listInfo{{ $i }}')">Info</button>
                                @if ($chores[$i]->finished_today == "Yes")
                                     <button type="button" class="btn btn-default disabled">Completed <i class="fa fa-check"></i></button>
                                @else
                                     <a class="btn btn-success" href="/completeChore/{{ $chores[$i]->id }}">Complete <i class="fa fa-check"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="listInfo0 listInfo text-center" id="listInfo{{ $i }}">
                                <p>{{ $chores[$i]->description }}</p>
                        </div>
                        @endfor
                    @else
                        <div class="list-group-item">
                            <p>You have no chores today!  Please check back tomorrow.</p>
                        </div>
                    @endif
                    <!--<div class="list-group-item">Take out Trash
                        <div class="listButtons">
                            <button type="button" class="btn btn-default" onclick="toggler('listInfo0')">Info</button>
                            <button type="button" class="btn btn-default">Complete <i class="fa fa-check"></i></button>
                        </div>
                    </div>
                    <div class="listInfo0 listInfo text-center" id="listInfo0">
                            <p>This Chore is to wash all the dishes in the sink.</p>
                    </div>


                    <div class="list-group-item">Wash Dishes
                        <div class="listButtons">
                            <button type="button" class="btn btn-default" onclick="toggler('listInfo1')">Info</button>
                            <button type="button" class="btn btn-default">Complete <i class="fa fa-check"></i></button>
                        </div>
                    </div>
                    <div class="listInfo1 listInfo text-center" id="listInfo1">
                            <p>This Chore is to wash all the dishes in the sink.</p>
                    </div>


                    <div class="list-group-item">Be a Total Badass
                        <div class="listButtons">
                            <button type="button" class="btn btn-default" onclick="toggler('listInfo2')">Info</button>
                            <button type="button" class="btn btn-default">Complete <i class="fa fa-check"></i></button>
                        </div>
                    </div>
                    <div class="listInfo2 listInfo text-center" id="listInfo2">
                            <p>This Chore is to wash all the dishes in the sink.</p>
                    </div>-->
                </div>
            </div>
        </div> <!-- top row -->



    </div> <!-- inner container -->

    <hr>

    <div class="container innerContainer">
            @if (count($listOfChores)>0 && count($listOfRoommates)>0)
                @foreach ($listOfChores as $key => $value)
                <div class="row">
                    <div class="col-md-5">
                        <div class="lead">{{ $key }}</div>
                            <div class="progress">
                                 @if ($listOfRoommates[$key]->numberOfCompletedChores == 0)
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%
                                @else
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ ($listOfRoommates[$key]->numberOfCompletedChores / ($listOfRoommates[$key]->numberOfCompletedChores + $listOfRoommates[$key]->numberOfIncompletedChores))*100 }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ ($listOfRoommates[$key]->numberOfCompletedChores / ($listOfRoommates[$key]->numberOfCompletedChores + $listOfRoommates[$key]->numberOfIncompletedChores))*100 }}%">{{ ($listOfRoommates[$key]->numberOfCompletedChores / ($listOfRoommates[$key]->numberOfCompletedChores + $listOfRoommates[$key]->numberOfIncompletedChores))*100 }}%
                                @endif
                                </div>
                            </div>
                    </div>
                    <div class="col-md-6 col-md-offset-1">
                       @foreach ($value as $element)
                           <p>Chore: {{ $element->name }} @if ($element->finished_today == "Yes")
                               <i class="fa fa-check"></i>
                           @endif</p>
                       @endforeach
                    </div>
                </div>
                <hr>
                @endforeach
            @endif
            <!--<div class="row">
            <div class="col-md-5">
                <div class="lead">Roomate 1</div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                        60%
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-1">
                <p>Chore: Washing the baseboards <i class="fa fa-check"></i></p>
                <p>Chore: Cleaning the Fridge</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-5">
                <div class="lead">Roomate 2</div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                        60%
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-1">
                <p>Chore: Washing the baseboards <i class="fa fa-check"></i></p>
                <p>Chore: Cleaning the Fridge</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-5">
                <div class="lead">Roomate 3</div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                        60%
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-1">
                <p>Chore: Washing the baseboards <i class="fa fa-check"></i></p>
                <p>Chore: Cleaning the Fridge</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-5">
                <div class="lead">Roomate 4</div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                        60%
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-1">
                <p>Chore: Washing the baseboards <i class="fa fa-check"></i></p>
                <p>Chore: Cleaning the Fridge</p>
            </div>
        </div>-->
    </div><!-- Inner Container -->

    <hr>

    <div class="container innerContainer">
        <div class="row">
            <div class="col-md-4">
            <button type="submit" class="form-control btn btn-primary addChoreButton">Add New Chore</button>
                <div class="well well-lg">
                    <div class="lead">Invite New Roomate</div>
                    <input type="text" class="form-control" placeholder="Email">
                    <br>
                    <button type="button" class="form-control" class="btn btn-default">Submit</button>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-2">
                <div class="lead">Apartment Info</div>
                <p>Apartment Name: {{ Auth::user()->apartment->name }}</p>
                <p>Apartment ID: {{ Auth::user()->apartment->id }}</p>
                <div class="lead">User Info</div>
                <p>Name: {{ Auth::user()->name }}</p>
                <p>User ID: {{ Auth::user()->id }}</p>
                <input type="text" class="form-control" placeholder="New Password">
                <br>
                <button type="button" class="form-control" class="btn btn-default">Submit</button>
            </div>
        </div>
    </div>
</div>
@endsection









