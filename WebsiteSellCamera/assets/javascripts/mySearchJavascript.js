$("#search-bar-form #search-minPrice, #search-bar-form #search-maxPrice").keypress(function (e) {
    if (e.keyCode >= 48 && e.keyCode <= 57)
        return true;
    return false;
});

$("#search-bar-form #search-submit").click(function (e) {
    $("#search-bar-form").submit();

    e.preventDefault();
});

$("#top-search>a").click(function () {
    var i = $(this).find("i");

    if (i.hasClass("fa-caret-square-o-down")) {
        i.removeClass("fa-caret-square-o-down").addClass("fa-caret-square-o-up");
    } else if (i.hasClass("fa-caret-square-o-up")) {
        i.removeClass("fa-caret-square-o-up").addClass("fa-caret-square-o-down");
    }
});

$("#search-bar-form #search-minPrice, #search-bar-form #search-maxPrice").number(true, 0);

