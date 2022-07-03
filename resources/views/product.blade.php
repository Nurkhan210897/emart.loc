@extends('layout')
@section('main')
    <div class="container mt-5 mb-5 product_wrapper">
        <div class="row">
            <div class="col-xl-6 h-100">
                <div class="product_img slider_for">
                    <div>
                        <a href="{{ Voyager::image($product->cover) }}" data-fancybox="gallery">
                            <img src="{{ Voyager::image($product->cover) }}" />
                        </a>
                    </div>
                    @if (!empty($product->images))
                        @foreach (json_decode($product->images) as $image)
                            <div>
                                <a href="{{ Voyager::image($image) }}" data-fancybox="gallery">
                                    <img src="{{ Voyager::image($image) }}" />
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
                @if (!empty($product->images))
                    <div class="slider_nav">
                        <div>
                            <img src="{{ Voyager::image($product->cover) }}" />
                        </div>
                        @foreach (json_decode($product->images) as $image)
                            <div>
                                <img src="{{ Voyager::image($image) }}" />
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="col-xl-6">
                <div class="detail">
                </div>
                <div class="title-product">
                    <p>{{ $product->name }}</p>
                </div>
                <div class="category-block-text">
                    <ul class="category_list">
                        <li>
                            <p>Артикул:</p>
                            <span>{{ $product->vendor_code }}</span>
                        </li>
                        <li>
                            <p>Цена:</p>
                            <span>{{ number_format($product->price, 0, '.', ' ') }} тг</span>
                        </li>
                        <li>
                            <p>Гарантия:</p>
                            <span>{{ $product->guarantee }} мес.</span>
                        </li>
                        <li>
                            <p>Бранд:</p>
                            <span>{{ $product->brand }}</span>
                        </li>
                        <li>
                            <p>В наличии:</p>
                            <span>{{ $product->count }} шт</span>
                        </li>
                    </ul>
                    {{-- <a href="{{ $product->kaspi_link }}" class="btn_kaspi">
                        <img src="/images/kaspi_logo.webp">
                        <div class="price_wrapper">
                            Купить в кредит
                            <div class="price_info">
                                <span class="large_text">4 460 </span>
                                <span class="small_text"> x 12 мес</span>
                            </div>
                        </div>
                        <a> --}}
                    <a href="#" type="btn" class="d-block mt-4 wp_btn"><img src="/images/wp_btn.svg"></a>
                    <div class="flex-elems">
                        <button type="button" class="btn d-block btn-yellow" data-id='{{ $product->id }}'>
                            Добавить в корзину
                        </button>
                        {{-- <div class="input-group spinner pull-left">
                            <input type="number" class="form-control"
                                value="{{ session()->has('basket.' . $product->id) ? session('basket.' . $product->id)['count'] : 1 }}"
                                id="item-count" min="1" data-id='{{ $product->id }}'>
                        </div> --}}
                        <div class="counter">
                            <button class="btn counter_btn">-</button>
                            <span class="count">1</span>
                            <button class="btn counter_btn">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-3">
            <div class="product_description">
                <h4 class="product_description-title">ОПИСАНИЕ</h4>

                <ul class="product_description-list">
                    <li class="list_title">
                        <p>Преимущества и особенности:</p>
                    </li>
                    <li class="list_description">
                        <p>{!! $product->description !!}</p>
                    </li>
                </ul>
            </div>
            <div class="product_description">
                <h4 class="product_description-title">Характеристики</h4>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Характеристики</th>
                            <th scope="col">Показатель</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product->specifications as $productSpecification)
                            <tr>
                                <td>{{ $productSpecification->specification->name }}</td>
                                @if (!empty($productSpecification->textValue))
                                    <td>{{ $productSpecification->textValue->value }}</td>
                                @elseif(!empty($productSpecification->listValue->list))
                                    <td>{{ $productSpecification->listValue->list->name }}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
