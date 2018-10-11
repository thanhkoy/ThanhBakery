function addCart(id) {
    setTimeout("$('#addCart-modal').modal('hide')", 750);
    $.ajax({
        url: "?f=cart/addCart",
        type: "post",
        dataType: "text",
        data: {
            id: id
        }
    });
}

function listItem() {
    $.ajax({
        url: "?f=cart",
        type: "post",
        success: function (result) {
            $('#cart-modal-content').html(result);
        }
    });
}

function changeItem(id, quantity) {
    $.ajax({
        url: "?f=cart/editCart",
        type: "post",
        dataType: "text",
        data: {
            id: id,
            quantity: quantity
        },
        success: function (result) {
            $('#cart-modal-content').html(result);
        }
    });
}

function applyCode() {
    var code = $('#coupon-value').val();
    $.ajax({
        url: "?f=cart/addCode",
        type: "post",
        dataType: "text",
        data: {
            code: code
        },
        success: function (result) {
            $('#cart-modal-content').html(result);
        }
    });
}

function checkout() {
    var fullname = $('#pay-receiver').val();
    var address = $('#pay-address').val();
    $.ajax({
        url: "?f=cart/checkout",
        type: "post",
        dataType: "text",
        data: {
            fullname: fullname,
            address: address
        },
        success: function (result) {
            $('#checkout-modal').html(result);
        }
    });
}

function register() {
    var username = $('#reg-username').val();
    var password = $('#reg-pw').val();
    var re_password = $('#reg-pw-2').val();
    var phone = $('#reg-phone').val();
    var email = $('#reg-email').val();
    var address = $('#reg-address').val();

    if (password !== re_password) {
        alert("Repeat password do not match!");
    }
    else {
        $.ajax({
            url: "?f=account/register",
            type: "post",
            dataType: "text",
            data: {
                username: username,
                password: password,
                phone: phone,
                email: email,
                address: address
            },
            success: function (result) {
                $('#reg-modal').html(result);
            }
        });
    }
}

function imageShow(image) {
    $('#image-show').attr('src', 'views/assets/images/product/' + image);
}

function feedback() {
    var content = $('#feedback-content').val();
    $.ajax({
        url: "?f=feedback",
        type: "post",
        dataType: "text",
        data: {
            content: content
        },
        success: function (result) {
            $('#feedback-modal').html(result);
        }
    });
}

$(function () {
    var value = $('#star-value').val();
    if (value === '') {
        value = 0;
    }
    var status = $('#star-value').attr("status");
    $("#rateYo").rateYo({
        rating: value,
        fullStar: true,
        readOnly: Boolean(parseInt(status))
    });
});

$(function () {
    var id = $('#star-value').attr("product");
    $("#rateYo").rateYo()
        .on("rateyo.set", function (e, data) {
            $.ajax({
                url: "?f=menu/rate",
                type: "post",
                dataType: "text",
                data: {
                    value: data.rating,
                    id: id
                }
            });
        });
});

window.fbAsyncInit = function () {
    FB.init({
        appId: '176431129621848',
        autoLogAppEvents: true,
        xfbml: true,
        version: 'v3.1'
    });
};

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
