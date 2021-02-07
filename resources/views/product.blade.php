@extends('layout')
@section('main')
<div class="container mt-5 mb-5">
     <div class="row">
          <div class="col-xl-6">
               <div class="product_img">
                    <img src="{{Voyager::image($product->cover)}}" alt="" class="drift-demo-trigger" data-zoom="{{Voyager::image($product->cover)}}" >
               </div>

          </div>
          <div class="col-xl-6">
           <div class="detail">
                         </div>
               <div class="title">
                    <p>{{$product->name}}</p>
               </div>
               <div class="category-block-text">
                    <span class="small-text">Артикул: {{$product->vendor_code}}</span>
                    <span class="small-text">Цена: {{number_format($product->price,0,'.',' ')}} тг</span>
                    <div class="small-text">Гарантия: {{$product->guarantee}}</div>
                    <span class="small-text">Бранд: {{$product->brand}}</span>
                    <span class="small-text">В наличии: {{$product->count}}</span>
                     <a href="#" class="btn_kaspi"><img src="/images/kaspi_logo.webp"><div class="price_wrapper"> Купить в кредит <div class="price_info"><span class="large_text">4 460  </span><span class="small_text"> x 12 мес</span></div></div><a>
                    <a href="#" type="btn" class="d-block mt-4"><img src="/images/wp_btn.svg"></a>
                    <div class="add_cart">
                     <div class="input-group spinner pull-left">
                         <input type="number" class="form-control" value="1" id="item-count" min="1">
                     </div>
                     <button type="button" class="btn btn-green d-block"><i class="fas fa-shopping-cart"></i>Добавить в корзину</button></div>
               </div>
           </div>
     </div>
     <div class="row mt-3">
        <div class="col-12">
            <h4>ОПИСАНИЕ</h4>
            {!! $product->description !!}
        </div>
        <div class="col-12">
            <h4>ХАРАКТЕРИСТИКИ</h4>
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
