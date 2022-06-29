@extends('layout')

@section('main')
<div class="main_slider_wrapper">
    @foreach($topSliders as $slider)
        <div class="main_slider">
            <div class="main_slider-item" style="background-image: url('{{Voyager::image($slider->image)}}')">
                <div class="container">
                    <div class="slder_text">
                        <p class="slider_title">{!!$slider->title!!}</span>
                        </p>
                        <div class="slider_descr">
                            <p>{{$slider->description}}</p>
                        </div>
                        <div class="slider-navs">
                            <button class="btn prev slider-arrow"><img src="/storage/img/slider-left.svg"></button>
                            <div class="slider-dots">
                                <div class="slider-dots-count"></div>
                            </div>
                            <button class="btn next slider-arrow"><img
                                    src="/storage/img/main-slider-right.svg"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <!-- AREND-CATEGORY -->
    <div class="main-category">
        <div class="container">
            <div class="main-category-content">
                <div class="row">
                    @foreach($categories as $category)
                    <div class="col-xl-4 col-6 col-md-4">
                        <div class="main-cartegory-card">
                            <a href="/{{$category->slug}}">
                                <div class="card_text">
                                    <p>{{$category->name}}</p>
                                </div>
                                <div class="category-block">
                                    <img src="/storage/img/card-img.png" alt="">
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- AREND-CATEGORY-END -->

        <!-- ABOUT_US -->

        <div class="about_us">
        <div class="container">
            <div class="title-block">
                <h2>Про нас</h2>
            </div>
            <div class="abous_us_slider">
                @foreach($aboutCompanySliders as $slider)
                <div class="about_us_slide">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="about_us_text">
                                <p>{{$slider->description}}</p>
                            </div>
                            <div class="slider-navs">
                                <button class="btn slider-arrow prev_about_slider"><img
                                        src="/storage/img/slider-left.svg"></button>
                                <div class="abous_us_slider-dots">
                                    <div class="about_slider-dots-count"></div>
                                </div>
                                <button class="btn slider-arrow next_about_slider"><img
                                        src="/storage/img/main-slider-right.svg"></button>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <img src="{{Voyager::image($slider->image)}}" class="about_us_img" alt="">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- ABOUT_US_END -->

    <!-- BRANDS -->
    <div class="brands">
        <div class="container">
            <div class="title-block-black">
                <h2>Бренды</h2>
            </div>
            <div class="brands_slider">
                @foreach($brands as $brand)
                <div class="brand_slider_item"><img src="{{Voyager::image($brand->image)}}" alt=""></div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- BRANDS_END -->

    <!-- Questions-->
    <div class="questions">
        <div class="container">
            <div class="title-block">
                <h2>Часто задаваемые вопросы</h2>
            </div>
            <div class="questions_content">
                @foreach($questions as $item)
                <div class="question">
                    <div class="question_header">
                        <p>{{$item->question}}</p>
                        <button class="btn plus">
                            <img src="/storage/img/plus.svg" alt="">
                        </button>
                    </div>
                    <div class="question_description">
                        <p>{{$item->answer}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Questions-END-->
@endsection
