<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">
    <title>{{$title}}</title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg  navbar-dark">
                <a class="navbar-brand" href="#">
                    <img src="./images/logo.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li>
                            <a href="#">Как заказать</a>
                        </li>
                        <li>
                            <a href="#">Как оплатить</a>
                        </li>
                        <li>
                            <a href="#">Доставка</a>
                        </li>
                        <li>
                            <a href="#">Условия аренды</a>
                        </li>
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
        <div class="container">
            <div class="info-header">
                <div class="info-header-content">
                    <i class="fas fa-exclamation-circle"></i>
                    <p><span>Внимание: </span>мы работаем в обычном режиме с 9:00 до 19:00 ч. <br> Принимаем все меры безопасности от вируса.</p>
                </div>
            </div>
        </div>
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
                        <li>
                            <a href="#">
                                Каталог
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Как заказать
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Как оплатить
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Доставка
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Условия аренды
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Идея для аренды
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Сотрудничество
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Вопросы и ответы
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Контакты
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Договор оферты
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Договор аренды
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Политика конфиденциальности
                            </a>
                        </li>
                    </ul>
                    <div class="footer-end">
                        <p>2015-2020 © proks.kz — сервис аренды товаров. Все права защищены.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="title">
                        <p>Служба заботы о клиентах</p>
                    </div>
                    <ul>
                        <li><a href="#">Заказать звонок </a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Написать сообщение </a></li>
                    </ul>
                    <ul>
                        <li><a href="#"> e-mail: info@proks.kz </a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="title">
                        <p>Подпишись</p>
                    </div>
                    <form action="">
                        <input type="text" placeholder="Ваш E-mail">
                        <input type="submit" class="btn btn-head" name="" id="">
                    </form>
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
    <script src="/js/main.js"></script>
</body>

</html>
