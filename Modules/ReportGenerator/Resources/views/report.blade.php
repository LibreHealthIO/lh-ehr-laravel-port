@extends('reportgenerator::layouts.master')

@section('title', 'Generated report')

@section('content')

  @foreach($data as $datum)
    {{ $datum }}
    <hr />
  @endforeach

@endsection
