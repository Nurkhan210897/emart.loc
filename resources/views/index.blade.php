@extends('layout')

@section('main')
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
@endsection
