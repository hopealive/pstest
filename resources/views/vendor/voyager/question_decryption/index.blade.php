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

    <div class="panel panel-bordered">
        <form action="" method="POST">
            @csrf
            <div class="panel-body">
                <div class="form-group col-md-12">
                    @foreach ($psychoTypes as $psychoType)
                    <?php $answers = $questionDecryptions->where('psycho_type_id', $psychoType->id)->pluck('answers')->first() ?? [];  ?>
                    <h2>{{ $psychoType->name }}</h2>
                    @foreach ($questions as $question)
                    <div class="form-group">
                        <label for="option_{{ $psychoType->id }}">{{ $question->title }}</label>
                        <select class="form-control" name="field_{{ $psychoType->id }}_{{ $question->id }}">
                            <option value="">Select answer</option>
                            @foreach ($question->option->sortBy('id') as $option)
                            <option value="{{ $option->id }}" <?= in_array($option->id, $answers) ? 'selected' : '' ?> >
                                {{ $option->description }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    @endforeach
                    @endforeach
                </div>
            </div>

            <div class="panel-footer">
                <button type="submit" class="btn btn-primary">{{ __('voyager::generic.submit') }}</button>
            </div>
        </form>
    </div>
</div>
@stop
