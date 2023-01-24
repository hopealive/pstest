@extends('voyager::master')

@section('page_title', 'Question Decryption')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            Question Decryption
        </h1>
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')

        <form action="" method="POST">
            @csrf
            <div class="row">
                {{-- TODO: implement form --}}
            </div>

            <div class="row">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">{{ __('voyager::generic.submit') }}</button>
                </div>
            </div>
        </form>
    </div>
@stop
