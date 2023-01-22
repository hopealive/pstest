@extends('layouts.app')

@section('content')

<div class="page-header clear-filter page-header-small" filter-color="orange">
    <div class="page-header-image" data-parallax="true" style="background-image:url('/img/bg5.jpg');">
    </div>
    <div class="container">
        <h3 class="title">Our test</h3>
        <p class="category">&nbsp;</p>
        <div class="content">
            <div class="social-description">
                <h2>10</h2>
                <p>Questions</p>
            </div>
            <div class="social-description">
                <h2>15</h2>
                <p>Minutes</p>
            </div>
            <div class="social-description">
                <h2>95%</h2>
                <p>Result</p>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="" method="POST">
            {{ csrf_field() }}

            @foreach ($questions as $question)
            <div class="section text-center">
                <div class="form-row">
                    <h3 class="title">
                        <?= $question->title ?>
                    </h3>
                    <h5 class="description">
                        <?= $question->description ?>
                    </h5>

                    @foreach ($question->option->sortBy('id') as $option)
                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="<?= 'question_' . $question->id ?>"
                                value=<?=$option->id ?>
                            <?= ($loop->first) ? 'checked' : '' ?>>
                            <span class="form-check-sign"></span>
                            <?= $option->description ?>
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach

            <div class="button-container text-center">
                <input type="submit" class="btn btn-primary btn-round btn-lg" value="Завершити тест">
            </div>
        </form>
    </div>
</div>

@endsection
