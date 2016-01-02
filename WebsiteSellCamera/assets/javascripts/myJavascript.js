$(document).ready(function () {
    var pos = 300; // position to show the back-to-top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > pos)
            $("#back-to-top").fadeIn("slow");
        else
            $("#back-to-top").fadeOut("fast");
    });

    $("#back-to-top").click(function (e) {
        e.preventDefault();
        $("body").animate({
            scrollTop: 0
        }, 500);
    });

    $("a.nav.navbar-nav.navbar-right").mousemove(function () {
        var next = $(this).next();
        var top = $(this).height();
        next.addClass("open");
        next.css({
            "right": 0,
            "top": top
        });
    });

    $("a.nav.navbar-nav.navbar-right").mouseout(function () {
        $(this).next().removeClass("open");
    });

    $(".navbar navbar-inverse .dropdown").mouseout(function () {
        $(this).removeClass("open");
    });
});
