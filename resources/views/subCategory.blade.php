@extends('layout')

@section('main')
    <div class="main-category">
        <div class="container">
            <div class="main-category-content">
                <div class="title-block">
                    <p>{{ $category->name }}</p>
                </div>
                <div class="row">
                        @foreach ($category->subCategories as $item)
                            <div class="col-xl-3 col-12 col-md-4">
                                @if($item->name===$subCategory->name)
                                <div class="category-card active">
                                @else
                                <div class="category-card">
                                @endif
                                    <a href="/{{$category->slug}}/{{ $item->slug }}">
                                        <div class="category-block">
                                            <img src="/storage/img/card-img.png" alt="">
                                        </div>
                                        <div class="card_text">
                                            <p>{{ $item->name }}</p>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        @endforeach
                </div>
                <div class="products">
                    <div class="title-block">
                        <p>{{$subCategory->name}}</p>
                    </div>
                    <div class="row">
                        @if($subCategory->products->isEmpty())
                        <div class="col-xl-3 col-md-6 col-12">
                            <p style="font-size: 20px;">Нет товаров!</p>
                        </div>
                        @else
                        @foreach($subCategory->products as $product)
                        <div class="col-xl-3 col-md-6 col-12">
                            <a href="/{{$category->slug}}/{{$subCategory->slug}}/{{$product->slug}}">
                                <div class="product_card">
                                    <div class="product_card_img">
                                        <img src="{{Voyager::image($product->cover)}}" alt="">
                                    </div>
                                    <div class="product_card_descr">
                                        <p class="product_card_name">{{$product->name}}</p>
                                        <p class="product_card_price">{{$product->price}} тг</p>
                                    </div>
                                    <button class="btn btn_yellow">В корзину</button>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
