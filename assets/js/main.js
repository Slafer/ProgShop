$(function() {

    function ShowCart(cart){
        $('#cart-modal .modal-cart-content').html(cart);
        $('#cart-modal').modal();

        let cartQty = $('#modal-cart-qty').text() ? $('#modal-cart-qty').text() : 0;
        $('.mini-cart-qty').text(cartQty);
    }

    $('.card-add-to-cart').on('click', function (e) {
        e.preventDefault();
        let id = $(this).data('id');

        $.ajax({
            url: 'cart.php',
            type: 'GET',
            data: {cart: 'add', id: id},
            dataType: 'json',
            success: function (res) {
                if (res.code == 'ok')
                {
                    ShowCart(res.answer);
                }
                else
                {
                    alert(res.answer);
                }
            },
            error: function ()
            {
                alert('Error');
            }
        });
    });
    $('#get-cart').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            url: 'cart.php',
            type: 'GET',
            data: {cart: 'show'},
            success: function (res) {
                    ShowCart(res);
            },
            error: function ()
            {
                alert('Error');
            }
        });
    });
    $('#cart-modal .modal-cart-content').on('click', '#clear-cart', function () {
        $.ajax({
            url: 'cart.php',
            type: 'GET',
            data: {cart: 'clear'},
            success: function (res) {
                    ShowCart(res);
            },
            error: function ()
            {
                alert('Error');
            }
        });
    });
    $('#cart-modal .modal-cart-content').on('click', '#cart-buy', function () {
        $.ajax({
            url: 'cart.php',
            type: 'GET',
            data: {cart: 'buy'},
            success: function (res) {
                ShowCart(res);
            },
            error: function ()
            {
                alert('Error');
            }
        });
    });
});