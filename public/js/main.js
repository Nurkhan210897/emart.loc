$(document).ready(function() {
    $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
        // new Drift(document.querySelector('.drift-demo-trigger'), {
        //     paneContainer: document.querySelector('.detail'),
        //     inlinePane: 900,
        //     inlineOffsetY: -85,
        //     containInline: true,
        //     hoverBoundingBox: false
        // });
    $(".burger").click(function() {
        console.log("burger");
        $(".burger-lines").toggleClass("burger-active");
        $(".mobile-menu").toggleClass("mobile-menu-active");
    });

    $("a.gallery").fancybox();

    $('.slider_for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        infinite: false,
        asNavFor: '.slider_nav'
    });
    $('.slider_nav').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.slider_for',
        dots: true,
        focusOnSelect: true,
        infinite: true,
        arrows: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            }
        ]

    });
    // $('.slider_nav img').each((i, item) => {
    //         $(item).click(function() {
    //             $('.slider_for img').attr('src', $(item).attr('src'));
    //             $('.slider_for a').attr('href', $(item).attr('src'));
    //         })
    //     })
    // $('[data-fancybox="gallery"]').fancybox({
    //     toolbar: "smallBtn",
    // });
    $('.addBasketBtn').on('click', function(e) {
        let productId = $(this).attr('data-id');
        let count = $('input[data-id=' + productId + ']').val();
        addToBasket(productId, count);
    });

    $('.basketProductCountInput').on('change', function(e) {
        let productId = $(this).attr('data-id');
        let count = $(this).val();
        addToBasket(productId, count);
    });

    function addToBasket(productId, count) {
        $.ajax({
            url: '/basket/add',
            method: 'POST',
            data: {
                count: count,
                productId: productId,
                "_token": $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                $('.product_wrapper').prepend(`
                    <div class="loader">
                        <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>`);
            },
            success: function(res) {
                $('.loader').remove();
                sweetAlert('success', 'Товар успешно добавлен в корзину!');
                $('#basketTotalCount').html(res.totalCount);
                $('#basketTotalPrice').html(res.totalPrice + ' тг');
                $('.totalPrice[data-id="' + productId + '"]').html(res.product.totalPrice + ' тг');
            },
            error: function(e) {
                console.log(e);
                $('.loader').remove();
            }
        });
    }

    $('.deleteProductFromBasket').on('click', function() {
        let id = $(this).attr('data-id');
        deleteFromBasket(id);
    });

    function deleteFromBasket(id) {
        $.ajax({
            url: '/basket/delete',
            method: 'DELETE',
            data: {
                productId: id,
                "_token": $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res) {
                sweetAlert('success', 'Товар успешно удалён с корзины!');
                $('#basketTotalCount').html(res.totalCount);
                $('#basketTotalPrice').html(res.totalPrice);
                $('.product[data-id="' + id + '"]').remove();
                if (Number(res.totalCount) === 0) {
                    window.location.href = "/";
                }
            },
            error: function(e) {
                console.log(e);
            }
        });
    }

    $('#orderHandleBtn').on('click', function(e) {
        e.preventDefault();
        let form = $('#basketForm').serializeArray();
        $.ajax({
            url: '/order/handle',
            method: 'POST',
            data: form,
            beforeSend() {
                $('#basketForm span').html('');
                $('#basketForm span').hide();
                $('.product_wrapper').prepend(`
                    <div class="loader">
                        <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>`);
            },
            success: function(res) {
                $('.loader').remove();
                $('#orderId').html(res.orderId);
                $('#orderModal').modal('show');
            },
            error: function(e) {
                $('.loader').remove();
                let errors = e.responseJSON.errors;
                for (let id in errors) {
                    $('#basketForm span#' + id).html(errors[id][0]);
                    $('#basketForm span#' + id).show();
                }
            }
        });
    });

    $('#orderModal').on('hidden.bs.modal', function(e) {
        $('#basketTotalCount').html(0);
        window.location.href = '/';
    });

    function sweetAlert(status, msg) {
        Swal.fire({
            position: 'top-end',
            icon: status,
            title: msg,
            customClass: 'swal-wide',
            showConfirmButton: false,
            timer: 1500
        });
    }
});