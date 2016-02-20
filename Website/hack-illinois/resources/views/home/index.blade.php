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
                      <div class="panel-heading"><h1>Saturday</h1></div>
                      <div class="panel-body">
                        <h1>20</h1>
                      </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="list-group">
                    <div class="list-group-item active">
                        Todays Chores
                    </div>


                    <div class="list-group-item">Take out Trash
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
                    </div>
                </div>
            </div>
        </div> <!-- top row -->

        

    </div> <!-- iner container -->

    <hr>

</div>
@endsection









