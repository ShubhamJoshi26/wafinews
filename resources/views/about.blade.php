@extends('layouts.master')

@section('content')
{{dd($about)}}
    {!! @$about->content !!}
@endsection