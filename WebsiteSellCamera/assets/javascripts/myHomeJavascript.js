$("#content").ready(function () {
    $("button.addCart").click(function () {
        var amountValue = $(".navbar-inverse .fa.fa-shopping-cart.fa-3x").prev();
        var amount = parseInt(amountValue.text());
        amount++;
        amountValue.text(amount);
        $("body").append("<div id='notice'></div>");
        var notice = $("#notice");
        notice.css({
            "position": "fixed",
            "right": 10,
            "top": 10,
            "background-color": "red",
            "color": "white",
            "display": "none",
            "padding": 20,
            "z-index": 3
        });
        notice.fadeIn(400);
        var message = "Đã thêm " + $(this).parent().children(".productName").text() + " vào giỏ hàng";
        notice.text(message);
        setTimeout(function () {
            $("#notice").remove();
        }, 5000);
    });

    $(".product").mousemove(function () {
        var btnDetail = $(this).children(".btnDetail");
        var img = $(this).children("img");
        var top = img.position().top + img.height() / 2;
        var left = img.position().left + img.width() / 2;
        btnDetail.css({
            "display": "block",
            "top": top - btnDetail.height() / 2,
            "left": left - btnDetail.width() / 2
        });
    });

    $(".product").mouseout(function () {
        $(this).children(".btnDetail").hide();
    });

    $(".productName").mouseenter(function () {
        var $this = $(this).children();
        if ($this[0].scrollWidth > $this.width())
            $this.animate({
                right: Math.abs($this[0].scrollWidth - $this.width())
            }, 700);
    });

    $(".productName").mouseleave(function () {
        var $this = $(this).children();
        $this.animate({
            right: 0
        }, 400);
    });
});