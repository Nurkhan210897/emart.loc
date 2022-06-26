@extends('layout')

@section('main')
    <div class="main-gategory">
        <div class="container">
            <div class="main-gategory-content">
                <div class="title">
                    <p>{{ $category->name }}</p>
                </div>
                <div class="row">
                    @if (!$category->subCategories->isEmpty())
                        @foreach ($category->subCategories as $subCategory)
                            <div class="col-xl-4 col-6 col-md-4">
                                <div class="category-main-top">
                                    <a href="/{{ $subCategory->slug }}">
                                        <div class="card_text">
                                            <p>{{ $subCategory->name }}</p>
                                        </div>
                                        <div class="gategory-block">
                                            <img src="/storage/img/card-img.png" alt="">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @elseif(!$category->products->isEmpty())
                        @foreach ($category->products as $product)
                            <div class="col-xl-4 col-6 col-md-4">
                                <div class="category-main-top">
                                    <a href="/{{ $category->slug }}/{{ $product->slug }}">
                                        <div class="card_text">
                                            <p>{{ $product->name }}</p>
                                        </div>
                                        <div class="gategory-block">
                                            <img src="/storage/img/card-img.png" alt="">
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
            </div>
        </div>
    </div>
@endsection
