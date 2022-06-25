@extends('layout')

@section('main')
    <!-- AREND-CATEGORY -->
    <div class="main-gategory mt-4">
        <div class="container">
            <div class="main-gategory-content">
                <div class="row">
                    @foreach($categories as $category)
                    <div class="col-xl-4 col-6 col-md-4">
                        <div class="main-cartegory-card">
                            <a href="/{{$category->slug}}">
                                <p>{{$category->name}}</p>
                                <div class="gategory-block">
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
@endsection
