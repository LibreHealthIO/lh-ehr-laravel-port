@extends('reportgenerator::layouts.master')

@section('title', 'Generated report')

@section('content')
  @foreach($option_ids as $option_id)
    <p>{{ $option_id }}</p>
  @endforeach
@endsection
