@extends('layout')

@section('main')
<div class="main-gategory">
        <div class="container">
            <div class="main-gategory-content">
                <div class="title">
                    <p>Результаты поиска: '{{$searched}}'</p>
                </div>
                <div class="row">
                    @if(!$products->isEmpty())
                        @foreach($products as $product)
                            <div class="col-xl-3 col-6 col-md-4">
                                <div class="category-main-top">
                                    <a href="/{{$product->category->slug}}/{{$product->slug}}">
                                        <div class="gategory-block">
                                            <img src="{{Voyager::image($product->cover)}}" alt="">
                                        </div>
                                        <p>{{$product->name}}</p>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                            <div class="col-12">
                                По данному запросу не найдено товаров!
                            </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
