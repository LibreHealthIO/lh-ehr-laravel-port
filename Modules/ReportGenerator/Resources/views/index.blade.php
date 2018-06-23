@extends('reportgenerator::layouts.master')

@section('title', 'Report Generator')

@section('content')
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
                                    @foreach ($draggable_components as $draggable_component)
                                        <div class="col-sm-2 wordwrap draggable" id="{{ $draggable_component->option_id }}">
                                            <p data-toggle="tooltip" data-placement="top" title="{{ $draggable_component->title }}">
                                                {{ $draggable_component->title }}
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
