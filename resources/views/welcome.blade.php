@extends('layouts.app')

@section('content')
<div class="page-header page-header-small">
    <div class="page-header-image" data-parallax="true" style="background-image: url('/img/bg6.jpg');">
    </div>
    <div class="content-center">
        <div class="container">
            <h1 class="title">This is our great tests</h1>
            <div class="text-center">
                <a href="#pablo" class="btn btn-primary btn-icon btn-round">
                    <i class="fab fa-facebook-square"></i>
                </a>
                <a href="#pablo" class="btn btn-primary btn-icon btn-round">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#pablo" class="btn btn-primary btn-icon btn-round">
                    <i class="fab fa-google-plus"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="section text-center">
    <a href="/tests" class="btn btn-primary btn-lg btn-round" type="button">
        <i class="now-ui-icons ui-2_favourite-28"></i> Start test
    </a>
</div>

<div class="section section-contact-us text-center">
    <div class="container">
        <h2 class="title">Contact with me?</h2>
        <p class="description">Your are very important to me.</p>
        <div class="row">
            <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
                <div class="input-group input-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="now-ui-icons users_circle-08"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="First Name...">
                </div>
                <div class="input-group input-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="now-ui-icons ui-1_email-85"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Email...">
                </div>
                <div class="textarea-container">
                    <textarea class="form-control" name="name" rows="4" cols="80"
                        placeholder="Type a message..."></textarea>
                </div>
                <div class="send-button">
                    <a href="#pablo" class="btn btn-primary btn-round btn-block btn-lg">Send Message</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
