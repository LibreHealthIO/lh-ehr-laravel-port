@extends('reportgenerator::layouts.master')

@section('title', 'Generated report')

@section('content')
  @foreach($option_ids as $option_id)
    <p>{{ $option_id }}</p>
  @endforeach

  @foreach($notes as $note)
    <p>{{ $note->note }}</p><br>
  @endforeach

  @foreach($column_list as $columns)
    @for($i = 0; $i < count($columns); $i++)
        <p>{{ $columns[$i] }}</p>
    @endfor
  @endforeach
  {{ print_r($data) }}
@endsection
