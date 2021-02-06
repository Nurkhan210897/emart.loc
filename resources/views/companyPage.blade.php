@extends('layout')

@section('main')
<div class="breadcrubs">
    <div class="container">
        <a href="#" class="prev_link">Главная</a>
        <a href="#">{{$page->name}}</a>
    </div>
</div>


<div class="container">
    <div class="contacts">
        <div class="title_big">
            <h3>{{$page->name}}</h3>
        </div>
        <div class="contacts_content">
            <div class="row">
                {!! $page->text !!}
            </div>
        </div>
    </div>
</div>
@endsection
