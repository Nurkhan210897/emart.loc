@extends('layout')

@section('main')
<div class="main-gategory mt-4">
        <div class="container">
            <div class="main-gategory-content">
                <div class="title">
                    <p>{{$subCategory->name}}</p>
                </div>
                <div class="row">
                    @if(!$subCategory->products->isEmpty())
                        @foreach($subCategory->products as $products)
                            <div class="col-xl-3 col-6 col-md-4">
                                <div class="category-main-top">
                                    <a href="/product/{{$products->id}}">
                                        <div class="gategory-block">
                                            <img src="{{Voyager::image($products->cover)}}" alt="">
                                        </div>
                                        <p>{{$products->name}}</p>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                            <div class="col-12">
                                В данной категории пока нет товаров!
                            </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
