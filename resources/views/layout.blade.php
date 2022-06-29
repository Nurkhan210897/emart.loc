<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drift-zoom/1.3.1/drift-basic.min.css"
        integrity="sha512-us5Qz8z1MIzLykX5KtvnVAcomNfU28BC7wdaZS2QICFxgJo4QoLj6OXq/FeAl+qb+qyqsxilHoiMBgprdnKtlA=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
        integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
        integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/main.css?v=3">
    <title>{{ $title }}</title>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-196118502-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-196118502-1');
    </script>
</head>

<body>
    <!-- HEADER -->
    <header class="bg_layout">
        <div class="container">
            <nav class="navbar navbar-expand-lg  navbar-dark ">
                <div class="burger">
                    <span class="burger-lines"></span>
                </div>
                <div class="navbar_content">
                    <a class="navbar-brand" href="/">
                        <img src="/images/logo.svg" alt="" style="max-width:260px">
                    </a>
                    <div class="search">
                        <form action="/products/search" method='GET'>
                            <div class="search-input">
                                <input type="text" placeholder="Поиск..." name='text'>
                                <img src="/images/search-icon.svg" class="search-icon" alt="">
                            </div>
                            {{-- <button type="submit" class="btn btn_search">Найти</button> --}}
                        </form>
                    </div>
                    <div class="header_phone">
                        {{-- <a href="/basket" class="basket_icon desktop">
                                    <span class='basketTotalCount'>{{ $basketTotalCount }}</span>
                                    <i class="fas fa-shopping-basket"></i>
                                    корзина
                                </a> --}}
                        <div class="header_phone_content m-none">
                            <a href="tel:+7 778 293 06 06" class="phone">
                                +7 778 293 06 06
                                <img src="/images/wp-icon.svg" alt="">
                            </a>
                            {{-- <p>Без выходных с 9:00-22:00</p> --}}
                        </div>
                    </div>
                    <button class="header_button m-none">
                        <img src="/images/menu-icon.svg" alt="">
                    </button>
                </div>
            </nav>
        </div>
        <a href="/basket" class="basket_icon mobile_basket">
            <span class='basketTotalCount'>{{ $basketTotalCount }}</span>
            <i class="fas fa-shopping-basket"></i></a>
        <div class="mobile-menu">
            <ul>
                @foreach ($aboutCompanyPages as $pages)
                    @if ($pages->in_header)
                        <li>
                            <a href="/page/{{ $pages->id }}" target='_blank'>{{ $pages->name }}</a>
                        </li>
                    @endif
                @endforeach
                <div class="header_phone_content">
                    <a href="tel:+7 778 293 06 06" class="phone">
                        +7 778 293 06 06
                        <img src="/images/wp-icon.svg" alt="">
                    </a>
                    {{-- <p>Без выходных с 9:00-22:00</p> --}}
                </div>
            </ul>
        </div>
    </header>
    

    <!-- HEADER -->

    <!-- ATTENTION -->
    @if (!empty($notification))
        <div class="container">
            <div class="info-header">
                <div class="info-header-content">
                    <i class="fas fa-exclamation-circle"></i>
                    {!! $notification->text !!}
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
    <div class="modal fade back_call_modal" id="callModal" tabindex="-1" role="dialog"
        aria-labelledby="callModalLabel" aria-hidden="true">
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
    <footer >
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="title">
                        <p>О компании</p>
                    </div>
                    <ul>
                        @foreach ($aboutCompanyPages as $pages)
                            @if ($pages->in_footer)
                                <li>
                                    <a href="/page/{{ $pages->id }}">{{ $pages->name }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col-xl-5 col-md-6">
                    <div class="title">
                        <p>Интернет-магазин</p>
                    </div>
                    <ul>
                        <li><a href="#">Политика конфиденциальности</a></li>
                        <li><a href="#">Публичная оферта</a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="title">
                        <p>Контакты</p>
                    </div>
                    <ul>
                        <li><a href="#"><img src="/images/wp-icon.svg" alt=""></a></li>
                        <li><a href="#+7 778 293 06 06" class="tel">+7 778 293 06 06</a></li>
                    </ul>
                    <p>Балқантау, 95а, Нур-Султан</p>
                </div>
            </div>
            <div class="footer-end">
                <a href="/"> <img src="/images/logo.svg" alt=""></a>
            </div>
        </div>
    </footer>

    <!-- FOOTER-END -->


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/drift-zoom/1.3.1/Drift.min.js"
        integrity="sha512-Pd9pNKoNtEB70QRXTvNWLO5kqcL9zK88R4SIvThaMcQRC3g8ilKFNQawEr+PSyMtf/JTjV7pbFOFnkVdr0zKvw=="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
        integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
        crossorigin="anonymous"></script>
    <script src="/js/main.js?v=3"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js"
        type="text/javascript"></script>
</body>

</html>
