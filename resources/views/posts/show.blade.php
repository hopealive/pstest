@extends('layouts.app')

@section('content')
<div class="page-header clear-filter page-header-small" filter-color="orange">
    <div class="page-header-image" data-parallax="true" style="background-image:url('/img/bg5.jpg');">
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>{{ $post->title }}</h1>
                <img src="{{ Voyager::image( $post->image ) }}" style="width:100%">
                <p>{!! $post->body !!}</p>
            </div>
        </div>
    </div>
</div>
@endsection
