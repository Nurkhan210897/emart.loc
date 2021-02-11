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

    $('.addBasketBtn').on('click',function (e) {
        let productId=$(this).attr('data-id');
        let count=$('input[data-id='+productId+']').val();
        addToBasket(productId,count);
    });

    $('.basketProductCountInput').on('change',function (e) {
        let productId=$(this).attr('data-id');
        let count=$(this).val();
        addToBasket(productId,count);
    });

    function addToBasket(productId,count) {
        $.ajax({
            url:'/basket/add',
            method:'POST',
            data:{
                count:count,
                productId:productId,
                "_token": $('meta[name="csrf-token"]').attr('content')
            },
            success:function (res) {
                sweetAlert('success','Товар успешно добавлен в корзину!');
                $('#basketTotalCount').html(res.totalCount);
                $('#basketTotalPrice').html(res.totalPrice);
                $('.totalPrice[data-id="'+productId+'"]').html(res.product.totalPrice);
            },
            error:function (e) {
                console.log(e);
            }
        });
    }

    $('.deleteProductFromBasket').on('click',function () {
       let id=$(this).attr('data-id');
       deleteFromBasket(id);
    });

    function deleteFromBasket(id) {
        $.ajax({
            url:'/basket/delete',
            method:'DELETE',
            data:{
                productId:id,
                "_token": $('meta[name="csrf-token"]').attr('content')
            },
            success:function (res) {
                sweetAlert('success','Товар успешно удалён с корзины!');
                $('#basketTotalCount').html(res.totalCount);
                $('#basketTotalPrice').html(res.totalPrice);
                $('.product[data-id="'+id+'"]').remove();
                if(Number(res.totalCount)===0){
                    window.location.href="/";
                }
            },
            error:function (e) {
                console.log(e);
            }
        });
    }

    $('#orderHandleBtn').on('click',function (e) {
        e.preventDefault();
        let form=$('#basketForm').serializeArray();
        $.ajax({
            url:'/order/handle',
            method:'POST',
            data:form,
            success:function (res) {
                $('#orderId').html(res.orderId);
                $('#orderModal').modal('show');
            },
            error:function (e) {
                console.log(e);
            }
        });
    });

    $('#orderModal').on('hidden.bs.modal', function (e) {
        $('#basketTotalCount').html(0);
        window.location.href='/';
    });

    function sweetAlert(status,msg) {
        Swal.fire({
            position: 'top-end',
            icon: status,
            title: msg,
            showConfirmButton: false,
            timer: 1500
        });
    }
});
