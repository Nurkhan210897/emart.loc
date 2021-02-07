<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drift-zoom/1.3.1/drift-basic.min.css" integrity="sha512-us5Qz8z1MIzLykX5KtvnVAcomNfU28BC7wdaZS2QICFxgJo4QoLj6OXq/FeAl+qb+qyqsxilHoiMBgprdnKtlA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/main.css">
    <title>{{$title}}</title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg  navbar-dark">
                <a class="navbar-brand" href="#">
                    <img src="/images/logo.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

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
                        <form action="">
                            <div class="search-input">
                                <input type="text" placeholder="Поиск">
                                <i class="fas fa-search"></i>
                            </div>
                            <input type="submit" class="btn btn-head">
                        </form>
                    </div>
                    <!-- <a href="#" type="button" class="btn btn-head ml-4">Войти</a> -->
                </div>
            </nav>
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


    <!-- FOOTER -->
    <footer>
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
                                     <a href="/page/{{$pages->id}}" target='_blank'>{{$pages->name}}</a>
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


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/drift-zoom/1.3.1/Drift.min.js" integrity="sha512-Pd9pNKoNtEB70QRXTvNWLO5kqcL9zK88R4SIvThaMcQRC3g8ilKFNQawEr+PSyMtf/JTjV7pbFOFnkVdr0zKvw==" crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>
</body>

</html>
