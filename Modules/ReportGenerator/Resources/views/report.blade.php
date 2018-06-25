@extends('reportgenerator::layouts.master')

@section('title', 'Generated report')

@section('content')

<table style="table-layout: fixed;" border="1" width="{{ count($data) < 5 ? '100%' : '' }}">
    <tr>
        @foreach($data as $index => $datum)
            <td>
                <table class="table table-sm">
                    <thead>
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

@endsection
