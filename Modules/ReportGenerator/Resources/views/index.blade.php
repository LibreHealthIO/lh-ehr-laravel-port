@extends('reportgenerator::layouts.master')

@section('title', 'Report Generator')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-warning" style="background-color:#fd7e14 !important">
        <!-- The button below opens the add system feature modal below. -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-system-feature">Add system feature</button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Clients</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Patient list</a>
                        <a class="dropdown-item" href="#">Patient list by referrer</a>
                        <a class="dropdown-item" href="#">Patient list creation</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Visits</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Financial</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Procedures</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Insurance</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Inventory</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search system features" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav><!-- /.navbar -->
    &nbsp;
    <div class="container">
      <div class="alert alert-success" style="display:none"></div>
        <div class="row">
            <div class="col-sm-6">
                <div id="accordion">
                    <div class="card">
                        <form id="dropForm">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0"><b>Drop columns here</b>
                                <button type="button" name="submit" class="btn btn-info" id="generate-button">Generate report</button></h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body" id="second">
                                    <p class="note">Why am I still empty?</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0" id="card-header"><b>Select your desired columns here</b></h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <p class="note">Frequently used columns</p>
                                <div class="row" id="draggable-column">
                                    @foreach ($draggableComponents as $draggableComponent)
                                        <div class="col-sm-2 wordwrap draggable" id="{{ $draggableComponent->option_id }}">
                                            <p data-toggle="tooltip" data-placement="top" title="{{ $draggableComponent->title }}">
                                                {{ $draggableComponent->title }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        &nbsp;<hr />
        <!-- This block will be used to generate reports from custom query supplied by advanced users. -->
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0" id="card-header"><b>Enter SQL to generate report</b></h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <form class="sql-form" action="index.html" method="post">
                                    <div class="form-group">
                                        <label for="sql-query">Enter SQL query</label>
                                        <textarea class="form-control" aria-label="Enter query" disabled></textarea>
                                    </div>
                                    <button type="button" name="submit" class="btn btn-info" disabled>GO</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div><!-- /.container -->
    <!-- Add system feature modal-->
    <div class="modal fade" id="add-system-feature" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><b>New System Feature</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="add-system-feature-form" action="index.html" method="post">
                        <div class="form-group">
                            <label for="feature-name">Feature name</label>
                            <input type="text" name="feature-name" class="form-control" placeholder="Enter feature name">
                        </div>
                        <div class="form-group">
                            <label for="feature-name">Short description</label>
                            <textarea class="form-control" aria-label="Describe feature"></textarea>
                        </div>
                        <hr />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" name="submit" class="btn btn-info">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /#add-system-feature -->
@endsection
