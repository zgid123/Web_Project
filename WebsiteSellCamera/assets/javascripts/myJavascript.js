$("body").ready(function () {
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
});
