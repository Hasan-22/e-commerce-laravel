@extends('layouts.frontend')

@section('body')
    @include('frontend.partials.banner')

    @include('frontend.partials.popularCategory')

    @include('frontend.partials.trendingProducts')
@endsection
