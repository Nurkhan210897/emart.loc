@extends('layout')

@section('main')
    <div class="delivery-terms">
        <div class="container">
            <div class="title-page">
                <h1>Условия доставки
                </h1>
                <p>Вся информация об условиях доставки</p>
            </div>
            <div class="delivery-terms_content">
                <ul>
                    @foreach($deliveryTerms as $term)
                    <li class="list-item">
                        <div class="list-head">
                            <div class="numbering">{{$term->serial_number}}</div>
                            <p>{!!$term->description!!}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
