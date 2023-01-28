@extends('layouts.app')

@section('content')
<div class="page-header page-header-small">
    <div class="page-header-image" data-parallax="true" style="background-image: url('/img/bg6.jpg');">
    </div>
    <div class="content-center">
        <div class="container">
            <h1 class="title">Пройдіть наш тест і взнайте ваш тип</h1>
            <div class="text-center">
                <a href="https://www.facebook.com/yana.orlova.549" class="btn btn-primary btn-icon btn-round"
                    target="_blank">
                    <i class="fab fa-facebook-square"></i>
                </a>
                <a href="https://www.instagram.com/ninn978" class="btn btn-primary btn-icon btn-round" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="section text-center">
    <a href="/tests" class="btn btn-primary btn-lg btn-round" type="button">
        <i class="now-ui-icons ui-2_favourite-28"></i> Почати тест
    </a>
</div>

<div class="section text-center">
    <div class="row">
        @foreach ($psychoTypes as $psychoType)
        <div class="col-lg-4 text-center col-md-4">
            <div class="title">{{ $psychoType->post->title }}</div>
            <img src="{{ Voyager::image( $psychoType->post->image ) }}" alt="{{ $psychoType->post->title }}"
                class="rounded-circle img-thumbnail col-md-2">
            <p>{!! $psychoType->post->body !!}</p>
        </div>
        @endforeach
    </div>
</div>

<div class="section text-center">
    <a href="/tests" class="btn btn-primary btn-lg btn-round" type="button">
        <i class="now-ui-icons ui-2_favourite-28"></i> Почати тест
    </a>
</div>

<div class="section section-contact-us text-center">
    <div class="container">
        <h2 class="title">Контакт</h2>
        <div class="row">
            <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
                <div class="input-group input-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="now-ui-icons users_circle-08"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Ім'я...">
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
                        placeholder="Напишіть повідомлення..."></textarea>
                </div>
                <div class="send-button">
                    <a href="#pablo" class="btn btn-primary btn-round btn-block btn-lg">Відправити повідомлення</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
