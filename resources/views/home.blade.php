@extends('layouts.master')

@section('content')
    <!-- breaking news  carousel-->
    {{-- @include('frontend.home-components.breaking-news') --}}
    <!-- End breaking news carousel -->

    <!-- Hero news Secion-->
    @include('home-components.hero-slider')
    <!-- End Hero news Section-->
   

    <!-- Popular news category -->
    @include('home-components.main-news')
    <!-- End Popular news category -->
@endsection
