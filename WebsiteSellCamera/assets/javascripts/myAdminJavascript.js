// Javascript for Product Management
$("#search-bar-form #search-minPrice, #search-bar-form #search-maxPrice").keypress(function (e) {
    if (e.keyCode >= 48 && e.keyCode <= 57)
        return true;
    return false;
});

$("#search-bar-form #search-submit").click(function (e) {
    $("#search-bar-form").submit();

    e.preventDefault();
});

$("#search-bar-form #search-minPrice, #search-bar-form #search-maxPrice").number(true, 0);

$("#content").on("click", "button[name='product-remove']", function () {
    var data = {};

    var url = $(location).attr('href');
    url = url.substring(url.lastIndexOf("/") + 1, url.length).trim();

    data["Method"] = "remove";
    data["ID"] = $(this).val();
    data["For"] = $(this).attr("name");

    $.ajax({
        url: url,
        data: data,
        type: "POST",
        success: function (data) {
            $("#content>tbody").replaceWith($(data).find("#content>tbody"));
        }
    });
});

$("#content").on("click", "button[name='product-restore']", function () {
    var data = {};

    var url = $(location).attr('href');
    url = url.substring(url.lastIndexOf("/") + 1, url.length).trim();

    data["Method"] = "restore";
    data["ID"] = $(this).val();
    data["For"] = $(this).attr("name");

    $.ajax({
        url: url,
        data: data,
        type: "POST",
        success: function (data) {
            $("#content>tbody").replaceWith($(data).find("#content>tbody"));
        }
    });
});


