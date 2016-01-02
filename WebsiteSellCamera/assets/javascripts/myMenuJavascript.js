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

    $(this).find("input").each(function () {
        var name = $(this).attr("name");
        var value = $(this).val();
        data[name] = value;
    });

    $.ajax({
        url: "index.php",
        type: 'POST',
        data: data
    });

    event.preventDefault();
});