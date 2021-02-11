@extends('layout')

@section('main')
<div class="basket_wrapper">
@if(!empty($basket))
 <div class="container">
  <form action="/order/handle" method="POST">
    @csrf
   <div class="row">
    <div class="col-xl-6">
     <div class="title">
      <span>1</span>
      <p>ИНФОРМАЦИЯ О ПОКУПАТЕЛЕ</p>
     </div>
     <div class="user_info">
      <ul>
       <li>
        <label for="">Имя<span>*</span></label>
        <input type="text" placeholder="Введите ваше имя" name='fName' required>
       </li>
       <li>
        <label for="">Фамилия<span>*</span></label>
        <input type="text" placeholder="Введите вашу фамилию" name='sName' required>
       </li>
       <li>
        <label for="">Мобильный телефон<span>*</span></label>
        <input type="text" placeholder="" name='mobile' required>
       </li>
      </ul>
     </div>
     <div class="title">
      <span>2</span>
      <p>ИНФОРМАЦИЯ О ДОСТАВКЕ</p>
     </div>
     <div class="delivery">
      <div class="info_delivery">
       <ul>
        <li>
         <label for="">Адрес доставки<span>*</span></label>
         <textarea cols="40" rows="2" name='address' required></textarea>
        </li>
        <li>
         <label for="">Комментарий к доставке</label>
         <textarea cols="40" rows="2" name='commentToDelivery'></textarea>
        </li>
       </ul>
      </div>
     </div>
    </div>

    <div class="col-xl-6">
     <div class="your_purchases">
      <div class="title">
       <p>ВАШИ ПОКУПКИ</p>
      </div>
      @foreach($basket as $product)
      <div class="product" data-id="{{$product['id']}}">
        <div class="product_name">
            <img src="{{Voyager::image($product['cover'])}}" alt="">
            <a href="/product/{{$product['id']}}">{{$product['name']}}</a>
        </div>
       <div class="product_price">
            <input
                    type="number"
                    value="{{$product['count']}}"
                    class='basketProductCountInput'
                    data-id='{{$product['id']}}'
                    >
            <span class="totalPrice" data-id='{{$product['id']}}'>{{$product['totalPrice']}} тг</span>
            <span class="deleteProductFromBasket" data-id='{{$product["id"]}}'><i class="fas fa-times"></i></span>
       </div>
      </div>
      @endforeach
     </div>
     <div class="total_price">
      <div class="title">
       <p>СУММА К ОПЛАТЕ</p>
      </div>
      <ul>
       <li>Сумма заказа <span id="basketTotalPrice">{{$basketTotalPrice}} тг</span></li>
       <li>Доставка <span></span></li>
       <li>Итого к оплате <span></span></li>
      </ul>
      <div class="text-right">
       <button class="btn" style='border:1px solid'>ОФОРМИТЬ ЗАКАЗ</button>
      </div>
     </div>
    </div>
   </div>
  </form>
 </div>
 @else
 <div class='container'>
    <div class='row'>В корзине нет товаров!</div>
 </div>
 @endif
</div>
@endsection
