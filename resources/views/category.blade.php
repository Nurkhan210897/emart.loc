@extends('layout')

@section('main')
    <div class="main-category">
        <div class="container">
            <div class="main-category-content">
                <div class="title-block">
                    <p>{{ $category->name }}</p>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-12 col-md-4">
                        <p style="font-size: 20px;">Нет товаров!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
