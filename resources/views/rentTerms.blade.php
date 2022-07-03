@extends('layout')

@section('main')
    <div class="questions">
        <div class="container">
            <div class="title-page">
                <h1>Условия аренды
                </h1>
                <p>Вся информация об условиях аренды
                </p>
            </div>
            <div class="questions_content">
                @foreach($rentTerms as $rent)
                <div class="question">
                    <div class="question_header">
                        <p>{{$rent->title}}</p>
                        <button class="btn plus">
                            <img src="/storage/img/plus.svg" alt="">
                        </button>
                    </div>
                    <div class="question_description">
                        <p>{{$rent->description}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
