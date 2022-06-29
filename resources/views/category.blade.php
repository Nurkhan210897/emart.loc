@extends('layout')

@section('main')
    <div class="main-category">
        <div class="container">
            <div class="main-category-content">
                <div class="title-block">
                    <p>{{ $category->name }}</p>
                </div>
                <div class="row">
                    @if (!$category->subCategories->isEmpty())
                        @foreach ($category->subCategories as $subCategory)
                            <div class="col-xl-3 col-12 col-md-4">
                                <div class="category-card active">
                                    <a href="/{{ $subCategory->slug }}">
                                        <div class="category-block">
                                            <img src="/storage/img/card-img.png" alt="">
                                        </div>
                                        <div class="card_text">
                                            <p>{{ $subCategory->name }}</p>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @elseif(!$category->products->isEmpty())
                        @foreach ($category->products as $product)
                            <div class="col-xl-3 col-12 col-md-4">
                                <div class="category-card">
                                    <a href="/{{ $category->slug }}/{{ $product->slug }}">
                                        <div class="category-block">
                                            <img src="/storage/img/card-img.png" alt="">
                                        </div>
                                        <div class="card_text">
                                            <p>{{ $product->name }}</p>
                                        </div>

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
                <div class="products">
                    <div class="title-block">
                        <p>Масляные компрессоры</p>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-12">
                            <a href="#">
                                <div class="product_card">
                                    <div class="product_card_img">
                                        <img src="/storage/img/card-img.png" alt="">
                                    </div>
                                    <div class="product_card_descr">
                                        <p>Компрессор Mateus MS03304 (YV-0.17)</p>
                                        <p class="product_card_price">103 515 тг</p>
                                    </div>
                                    <button class="btn btn_yellow">В корзину</button>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
