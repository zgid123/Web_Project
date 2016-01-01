$(document).ready(function () {
    var $noticeCount = 0;
    var timer;
    var height;

    // Jquery for Page Detail
    $("#btnAddCart>.addCart").click(function () {
        var amountValue = $(".navbar-inverse .fa.fa-shopping-cart.fa-3x").prev();
        var amount = parseInt($("#productQuantity").val());
        amount += parseInt(amountValue.text());
        amountValue.text(amount);
        $("body").append("<div id='notice_" + $noticeCount + "'></div>");
        var notice = $("div[id*='notice_" + $noticeCount + "']");
        var message = "Đã thêm <b>" + $("#productName").text() + "</b> vào giỏ hàng";
        notice.append(message);
        height = notice.height() + 50;
        notice.css({
            "position": "fixed",
            "right": 10,
            "top": $noticeCount * height + 10,
            "background-color": "white",
            "color": "black",
            "display": "none",
            "padding": 20,
            "z-index": 3
        });
        notice.fadeIn(400);
        timer = setTimeout(function () {
            notice.remove();
            $noticeCount--;
            $("div[id*='notice_']").each(function () {
                $(this).css("top", "-=50px");
            });
        }, 5000);
        $noticeCount++;
    });

    $("#productQuantity").change(function () {
        if ($(this).val() <= 0) {
            $(this).val(1);
        }
    });

    $("#decrease").click(function () {
        if ($("#productQuantity").val() > 1) {
            $temp = parseInt($("#productQuantity").val());
            $temp--;
            $("#productQuantity").val($temp);
        }
    });

    $("#increase").click(function () {
        $temp = parseInt($("#productQuantity").val());
        $temp++;
        $("#productQuantity").val($temp);
    });

    $("#carousel-similar").on("slide.bs.carousel", function () {
        var text = $("#similarProduct>.list-group-item.title>span");

        if (text.text().trim() === "Sản phẩm cùng loại") {
            text.text("Sản phẩm cùng hãng");
        } else {
            text.text("Sản phẩm cùng loại");
        }
    });

    // Jquery for div similarProduct, product and content
    $("#similarProduct button.addCart, #product button.addCart, #content button.addCart").click(function () {
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
            "background-color": "white",
            "color": "black",
            "display": "none",
            "padding": 20,
            "z-index": 3
        });
        notice.fadeIn(400);
        var message = "Đã thêm <b>" + $(this).parent().children(".productName").text() + "</b> vào giỏ hàng";
        notice.append(message);
        setTimeout(function () {
            $("#notice").remove();
        }, 5000);
    });

    // Jquery for all Page
    $(".product").mousemove(function () {
        var btnDetail = $(this).children(".btnDetail");
        var img = $(this).children(".productImg");
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
