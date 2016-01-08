$("#price").number(true, 0);

$("#upload").change(function () {
    var path = URL.createObjectURL(event.target.files[0]);

    $("#img").attr("src", path);
});


