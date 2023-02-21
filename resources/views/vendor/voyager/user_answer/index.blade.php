@extends('voyager::master')

@section('page_title', 'User Answer')

@section('page_header')
<div class="container-fluid">
    <h1 class="page-title">
        User Answer
    </h1>
</div>
@stop

@section('content')
<div class="page-content browse container-fluid">
    @include('voyager::alerts')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Type</th>
                                    <th class="col-md-12">Answers</th>
                                    <th>User Info</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        #{{ $item->psycho_type_id }}&nbsp;{{ $item->psychoType->name ?? '' }}
                                    </td>
                                    <td>
                                        @foreach ($item->answers as $answerId)
                                        <?php
                                        $answersFiltered = $answers->filter( function($item) use ($answerId) {
                                            return $item->id == $answerId;
                                        } );
                                        ?>
                                        @if($answer = $answersFiltered->first())
                                        <h4>#{{ $answer->question->id }}&nbsp;{{ $answer->question->title }}</h4>
                                        #{{ $answer->id }}&nbsp;{{ $answer->description }}
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($item->user_info as $infoTitle => $info)
                                        <b>{{ $infoTitle }}:</b>&nbsp;{{ $info }}<br>
                                        @endforeach
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ $data->withQueryString()->links() }}
</div>
@stop
