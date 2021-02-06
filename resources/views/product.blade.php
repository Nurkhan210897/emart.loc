@extends('layout')
@section('main')
<div class="container mt-5 mb-5">
     <div class="row">
          <div class="col-xl-6">
               <div class="product_img">
                    <img src="{{Voyager::image($product->cover)}}" alt="">
               </div>
          </div>
          <div class="col-xl-6">
               <div class="title">
                    <p>{{$product->name}}</p>
               </div>
               <div class="category-block-text">
                    <span class="small-text">Артикул: {{$product->vendor_code}}</span>
                    <span class="small-text">Цена: {{number_format($product->price,0,'.',' ')}} тг</span>
                    <div class="small-text">Гарантия: {{$product->guarantee}}</div>
                    <span class="small-text">Бранд: {{$product->brand}}</span>
                    <span class="small-text">В наличии: {{$product->count}}</span>
                    <span class="small-text">Kaspi: {{$product->kaspi_link}}</span>
                    <button type="button" class="btn btn-basket">В корзину</button>
               </div>
           </div>
     </div>
     <div class="row">
        <div class="col-12">
            <h3>ХАРАКТЕРИСТИКИ</h3>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Характеристики</th>
                  <th scope="col">Показатель</th>
                </tr>
              </thead>
              <tbody>
                @foreach($product->specifications as $productSpecification)
                <tr>
                  <td>{{$productSpecification->specification->name}}</td>
                  @if(!empty($productSpecification->textValue))
                  <td>{{$productSpecification->textValue->value}}</td>
                   @else
                   <td>{{$productSpecification->listValue->list->name}}</td>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
     </div>
</div>
@endsection
