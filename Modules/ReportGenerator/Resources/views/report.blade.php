@extends('reportgenerator::layouts.master')

@section('title', 'Generated report')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-warning" style="background-color:#ccc !important">
    <!-- The button below opens the add system feature modal below. -->
    <h5 style="margin-right: 50px !important"><strong>Generated Report</strong></h5>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" style="margin-left: 500px !important">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-report-format">Save report as</button>&nbsp;
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-system-feature">Print</button>&nbsp;
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-system-feature">PDF</button>&nbsp;
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-system-feature">TXT</button>&nbsp;
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-system-feature">CSV</button>&nbsp;
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-system-feature">ODT</button>
        </ul>
    </div>
</nav><!-- /.navbar -->
<br />
<table style="table-layout: fixed;" border="1" width="{{ count($data) < 5 ? '100%' : '' }}">
    <tr>
        @foreach($data as $index => $datum)
            <td>
                <table class="table table-sm">
                    <thead style="background-color:#ccc !important">
                        <tr>
                            @if($index == 0)
                                <th scope="col">#</th>
                            @endif
                            <th scope="col">{{ $column_names[$index] }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($datum as $key => $item)
                                <?php $item = get_object_vars($item) ?> <!-- convert Std Object to array -->
                                @if($index == 0)
                                    <tr scope="row">
                                        <td>{{ $key + 1 }}: </td>
                                        <td class="table-wordwrap" style="white-space: nowrap" data-container="body" data-toggle="tooltip" title="{{ $item[$column_names[$index]] == '' ? 'No entry in the database' : $item[$column_names[$index]] }}">
                                            {{ empty($item[$column_names[$index]]) ? '---' : $item[$column_names[$index]] }}
                                        </td>
                                    </tr>
                                @else
                                    <tr scope="row">
                                        <td class="table-wordwrap" style="white-space: nowrap" data-container="body" data-toggle="tooltip" title="{{ $item[$column_names[$index]] == '' ? 'No entry in the database' : $item[$column_names[$index]] }}">
                                            {{ empty($item[$column_names[$index]]) ? '---' : $item[$column_names[$index]] }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </td>
        @endforeach
    </tr>
</table>

<!-- Add report format modal-->
<div class="modal fade" id="add-report-format" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><b>New Report Format</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="add-system-feature-form" action="index.html" method="post">
                    <div class="form-group">
                        <label for="feature_name">Select system feature</label>
                        <select class="form-control" id="feature_name">
                            @foreach($system_features as $system_feature)
                                <option value="{{ $system_feature->id }}">{{ $system_feature->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="report_name">Name of report</label>
                        <input type="text" name="report_name" class="form-control" placeholder="Enter report name">
                    </div>
                    <div class="form-group">
                        <label for="description">Short description</label>
                        <textarea class="form-control" name="description" aria-label="Describe new report"></textarea>
                    </div>
                    <hr />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" name="submit" class="btn btn-info">Save</button>
                </form>
            </div>
        </div>
    </div>
</div><!-- /#add-report-format -->

@endsection
