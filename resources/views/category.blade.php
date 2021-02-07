@extends('layout')

@section('main')
<div class="main-gategory mt-4">
        <div class="container">
            <div class="main-gategory-content">
                <div class="title">
                    <p>{{$category->name}}</p>
                </div>
                <div class="row">
                    @if(!$category->subCategories->isEmpty())
                        @foreach($category->subCategories as $subCategory)
                            <div class="col-xl-3 col-6 col-md-4">
                                <div class="category-main-top">
                                    <a href="/sub-category/{{$subCategory->id}}" target="_blank">
                                        <div class="gategory-block">
                                            <img src="{{Voyager::image($subCategory->cover)}}" alt="">
                                        </div>
                                        <p>{{$subCategory->name}}</p>
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
