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
        <form>
            <?php for($j = 1; $j <= 10; ++$j): ?>

            <div class="section text-center">
                <div class="form-row">
                    <h3 class="title">Question
                        <?= $j ?>
                    </h3>
                    <h5 class="description">
                        Who is on duty today?
                    </h5>

                    <?php for($i = 1; $i <= 6; ++$i): ?>
                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="question_<?= $j ?>" <?=$i==1 ? 'checked'
                                : '' ?>>
                            <span class="form-check-sign"></span>
                            Vasya
                            <?= $i ?> is duty today
                        </label>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>
            <?php endfor; ?>

            <div class="button-container text-center">
                <a href="#button" class="btn btn-primary btn-round btn-lg">Submit</a>
            </div>
        </form>
    </div>
</div>

@endsection
