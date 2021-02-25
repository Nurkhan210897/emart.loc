@extends('layout')

@section('main')
    <!-- AREND-CATEGORY -->
    <div class="main-gategory mt-4">
        <div class="container">
            <div class="main-gategory-content">
                <div class="row">
                    @foreach($categories as $category)
                    <div class="col-xl-3 col-6 col-md-4">
                        <div class="category-main-top">
                            <a href="/{{$category->slug}}">
                                <div class="gategory-block">
                                    <img src="{{Voyager::image($category->cover)}}" alt="">
                                </div>
                                <p>{{$category->name}}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- AREND-CATEGORY-END -->
@endsection
