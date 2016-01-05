$(document).ready(function () {
    $("#left .list-group:last").css({
        "height": $("#left .list-group:last").height() + 3
    });
});

// Javascript for Top-menu
$(".dropdown").mousemove(function () {
    $(this).addClass("open");
});

$(".dropdown").mouseout(function () {
    $(this).removeClass("open");
});

var $top = $(".fa.fa-shopping-bag.fa-3x>span.badge").height() - 1.5;
var $left = ($(".fa.fa-shopping-bag.fa-3x").width() - $(".fa.fa-shopping-bag.fa-3x>span.badge").width()) / 2;

$(".fa.fa-shopping-bag.fa-3x>span.badge").css({
    top: $top,
    left: $left
});

$(".fa.fa-shopping-bag.fa-3x>span.badge").on("change", function () {
    var $top = $(".fa.fa-shopping-bag.fa-3x>span.badge").height() - 1.5;

    var left = ($(".fa.fa-shopping-bag.fa-3x").width() - $(".fa.fa-shopping-bag.fa-3x>span.badge").width()) / 2;

    $(".fa.fa-shopping-bag.fa-3x>span.badge").css({
        top: $top,
        left: left
    });
});

// Javascript for Left-Menu
$(".dd-right").mousemove(function () {
    var next = $(this).next();
    var top = $(this).position().top;
    var width = $(this).parent().width() + 17;
    next.addClass("open");
    next.css({
        "top": top,
        "left": width
    });
    $(this).css({
        "background-color": "#00b2b3",
        "color": "white",
        "font-weight": "bold",
        "border-left": 0
    });
});

$(".dd-right").mouseout(function () {
    $(this).next().removeClass("open");
    $(this).css({
        "background-color": "#fff",
        "color": "#555",
        "font-weight": "bold",
        "border-left": 1
    });
});

$("div.dropdown>ul.dropdown-menu").mousemove(function () {
    $(this).parent().prev().css({
        "background-color": "#00b2b3",
        "color": "white",
        "font-weight": "bold",
        "border-left": 0
    });
});

$("div.dropdown>ul.dropdown-menu").mouseout(function () {
    $(this).parent().prev().css({
        "background-color": "#fff",
        "color": "#555",
        "font-weight": "bold",
        "border-left": 1
    });
});

// Javascript for Header
$("#cart").submit(function (event) {
    var data = {};

    var url = $(location).attr('href');
    url = url.substring(url.lastIndexOf("/") + 1, url.length).trim();

    $(this).find("input").each(function () {
        var name = $(this).attr("name");
        var value = $(this).val();
        data[name] = value;
    });

    var method = $("#cart>#Method").val();

    var newPage;

    $.ajax({
        url: url,
        type: 'POST',
        data: data
    }).always(function (data) {
        newPage = data;

        var amount = $(newPage).find(".navbar-inverse .fa.fa-shopping-bag.fa-3x").children("span.badge");
        $(".navbar-inverse .fa.fa-shopping-bag.fa-3x").children("span.badge").text(amount.text());

        $(".navbar-inverse .fa.fa-shopping-bag.fa-3x").children("span.badge").change();

        $(".dropdown-menu.pull-right").text($(newPage).find(".dropdown-menu.pull-right").text());

        if (method === "Update") {
            $("#cart-form input[name*='cart-quantity']").parents(".cart-numericUpDown").parent().each(function () {
                var mainID = $(this).parents(".content.row").find("button[name='cart-remove']").attr("data-proid");
                var currentDiv = $(this);

                $(newPage).find("#cart-form input[name*='cart-quantity']").parents(".cart-numericUpDown").parent().each(function () {
                    var currentID = $(this).parents(".content.row").find("button[name='cart-remove']").attr("data-proid");
                    if (mainID === currentID) {
                        currentDiv.next().text($(this).next().text());
                    }
                });
            });

            $("#cart-form-content>#total>span").first().text($(newPage).find("#cart-form-content>#total>span").first().text());
        } else if (method === "Remove") {
            $("#cart-form #cart-form-content").replaceWith(($(newPage).find("#cart-form #cart-form-content")));
        }

        if ($("#cart-form").length > 0) {
            $("#cart-form #btnPay").val($(newPage).find("#cart-form #btnPay").val());
        }
    });

    event.preventDefault();
});