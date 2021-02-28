<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drift-zoom/1.3.1/drift-basic.min.css" integrity="sha512-us5Qz8z1MIzLykX5KtvnVAcomNfU28BC7wdaZS2QICFxgJo4QoLj6OXq/FeAl+qb+qyqsxilHoiMBgprdnKtlA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/main.css">
    <title>{{$title}}</title>
</head>

<body>
    <!-- HEADER -->
    <header class="bg_layout">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg  navbar-dark ">
                <a class="navbar-brand" href="/">
                    <img src="/images/logo.png" alt="">
                </a>
                <div class="burger">
                    <span class="burger-lines"></span>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    @foreach($aboutCompanyPages as $pages)
                        @if($pages->in_header)
                            <li>
                                <a href="/page/{{$pages->id}}" target='_blank'>{{$pages->name}}</a>
                            </li>
                        @endif
                     @endforeach
                    </ul>
                    <div class="search">
                        <form action="/products/search" method='GET'>
                            <div class="search-input">
                                <input type="text" placeholder="Поиск" name='text'>
                                <i class="fas fa-search"></i>
                            </div>
                        </form>
                    </div>
                    <a href="/basket" class="basket_icon desktop">
                       <span id='basketTotalCount'>{{$basketTotalCount}}</span>
                    <i class="fas fa-shopping-basket"></i></a>
                </div>
            </nav>
        </div>
        <a href="/basket" class="basket_icon mobile_basket">
            <span id='basketTotalCount'>{{$basketTotalCount}}</span>
         <i class="fas fa-shopping-basket"></i></a>
         <div class="mobile-menu">
            <div class="search">
                <form action="/products/search" method='GET'>
                    <div class="search-input">
                        <input type="text" placeholder="Поиск" name='text'>
                        <i class="fas fa-search"></i>
                    </div>
                </form>
            </div>
            <ul>
                @foreach($aboutCompanyPages as $pages)
                        @if($pages->in_header)
                            <li>
                                <a href="/page/{{$pages->id}}" target='_blank'>{{$pages->name}}</a>
                            </li>
                        @endif
                     @endforeach
            </ul>
        </div>
    </header>


    <!-- HEADER -->

     <!-- ATTENTION -->
     @if(!empty($notification))
        <div class="container">
            <div class="info-header">
                <div class="info-header-content">
                    <i class="fas fa-exclamation-circle"></i>
                    {!!$notification->text!!}
                </div>
            </div>
        </div>
      @endif
     <!-- ATTENTION -->

    @yield('main')

    <div class="back-call">
        <div class="back-call-content">
            <span class="tooltip-top">Оставьте заявку на звонок</span>
            <button type="button" class="btn btn-toolip" data-toggle="modal" data-target="#callModal">
                <span class="call-btn">Кнопка связи</span>
                <span class="call-icon"><i class="fas fa-phone"></i></span>
                <span class="call-line"></span>
              </button>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade back_call_modal" id="callModal" tabindex="-1" role="dialog" aria-labelledby="callModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <div class="modal-body">
                    <h2>Оставьте заявку и мы свяжемся с вами в ближайщее время!</h3>
                        <form action="" id='callForm'>
                            @csrf
                            <input type="text" placeholder="Ваш номер" name='mobile'>
                            <input type="submit" value="Отправить">
                        </form>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <footer class="bg_layout">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="title">
                        <p>О компании</p>
                    </div>
                    <ul>
                        @foreach($aboutCompanyPages as $pages)
                             @if($pages->in_footer)
                                 <li>
                                     <a href="/page/{{$pages->id}}">{{$pages->name}}</a>
                                 </li>
                             @endif
                        @endforeach
                    </ul>
                    <div class="footer-end">
                        <p>2015-2020 © emart.kz — сервис аренды товаров. Все права защищены.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="title">
                        <p>Служба заботы о клиентах</p>
                    </div>
                    <ul>
                        <li><a href="#">Заказать звонок</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Написать сообщение</a></li>
                    </ul>
                    <ul>
                        <li><a href="#"> e-mail: info@proks.kz</a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="title">
                        <p>Подпишись</p>
                    </div>
                    <p>Будь в курсе всех новинок и предложений!</p>
                    <div class="socials">
                        <a href="#"> <i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-vk"></i></a>
                        <a href="#"><i class="fab fa-odnoklassniki"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-end">
                <p><span>ИП «Прокат Сервис» </span> <a href="#">использует файлы «cookie»,</a> с целью персонализации сервисов и повышения удобства пользования веб-сайтом. «Cookie» представляют собой небольшие файлы, содержащие информацию о предыдущих посещениях
                    веб-сайта. Если вы не хотите использовать файлы «cookie», измените настройки браузера.</p>
            </div>
        </div>
    </footer>

    <!-- FOOTER-END -->


    <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/drift-zoom/1.3.1/Drift.min.js" integrity="sha512-Pd9pNKoNtEB70QRXTvNWLO5kqcL9zK88R4SIvThaMcQRC3g8ilKFNQawEr+PSyMtf/JTjV7pbFOFnkVdr0zKvw==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
</body>

</html>
