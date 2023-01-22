{{-- TODO: implement test example --}}

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
                <h2>95%</h2>
                <p>Result</p>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <form>
            <div class="section text-center">
                <div class="form-row">
                    <h3 class="title">Question 1</h3>
                    <h5 class="description">
                        Who is on duty today?
                    </h5>
                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="exampleRadios" checked> <span
                                class="form-check-sign"></span>
                            Vasya is duty today
                        </label>
                    </div>
                    <?php for($i = 1; $i < 6; ++$i): ?>
                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="exampleRadios"> <span
                                class="form-check-sign"></span>
                            Vasya
                            <?= $i+1 ?> is duty today
                        </label>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>

            <div class="button-container">
                <a href="#button" class="btn btn-primary btn-round btn-lg">Submit</a>
            </div>
        </form>
    </div>
</div>

@endsection
