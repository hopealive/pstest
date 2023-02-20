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
                <h2>
                    <?= $questions->count() ?>
                </h2>
                <p>Questions</p>
            </div>
            <div class="social-description">
                <h2>
                    <?= round($questions->count() * 1.5) ?>
                </h2>
                <p>Minutes</p>
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
            <div class="section text-center <?= $loop->first ? '' : 'hidden' ?> " data-id="<?= $question->id ?>">
                <div class="form-row">
                    <h3 class="title">
                        {{ $loop->iteration }}.&nbsp;
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
                            <?= $loop->first ? 'checked' : '' ?>>
                            <span class="form-check-sign"></span>
                            <?= $option->description ?>
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach

            <div class="button-container text-center">
                <input type="button" class="btn btn-primary btn-round btn-lg button-next"
                    data-id="<?= $questions->first()->id ?>" value="Далі">
                <input type="submit" class="btn btn-primary btn-round btn-lg button-submit hidden"
                    value="Завершити тест">
            </div>
        </form>
    </div>
</div>

<style>
    .hidden {
        display: none;
    }

    .form-check {
        text-align: left;
    }

    .form-check-radio .form-check-sign:before,
    .form-check-radio .form-check-sign:after {
        top: 0;
        border: 2px solid #4f4f4f;
        width: 25px;
        height: 25px;
    }
</style>

@endsection

@section('page-script')
    <script>
        let questions = <?= $questions->pluck('id')->toJson() ?>;

        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".button-next")
                .forEach(btnNext => btnNext.addEventListener('click', event => process(btnNext, event)));
        });

        function process(btnNext, event) {
            let questionId = event.target.getAttribute("data-id");

            let questionIdKey = Object.keys(questions).find(key => questions[key] == questionId);
            if (typeof questionIdKey === 'undefined') {
                return;
            }

            let nextQuestionId = questions[parseInt(questionIdKey) + 1];
            if (typeof nextQuestionId === 'undefined') {
                return;
            }

            let afterNextQuestionId = questions[parseInt(questionIdKey) + 2];
            if (typeof afterNextQuestionId === 'undefined') {
                btnNext.classList.add('hidden')
                document.querySelectorAll('.button-submit').forEach(btnSubmit => btnSubmit.classList.remove('hidden'))
            }

            event.target.setAttribute("data-id", nextQuestionId);
            document.querySelectorAll('.section').forEach(section => {
                if (section.getAttribute('data-id') == questionId) {
                    section.classList.add('hidden');
                }
                if (section.getAttribute('data-id') == nextQuestionId) {
                    section.classList.remove('hidden');
                }
            })
        }
    </script>
@endsection
