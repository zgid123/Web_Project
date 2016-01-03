$(document).ready(function () {
    var $noticeCount = 0;
    var timer;
    var height;

    // Jquery for Page Detail
    $("#btnAddCart>.addCart").click(function () {
        var quantity = parseInt($("#productQuantity").val());
        $("#IDProduct").val($(this).attr("data"));
        $("#QuantityProduct").val(quantity);

        $("body").append("<div id='notice_" + $noticeCount + "'></div>");
        var notice = $("div[id*='notice_" + $noticeCount + "']");
        var message = "Đã thêm " + quantity + " <b>" + $("#productName").text() + "</b> vào giỏ hàng";

        var amount = $(".navbar-inverse .fa.fa-shopping-cart.fa-3x").prev();
        quantity += parseInt(amount.text());
        amount.text(quantity);

        $(".dropdown-menu.pull-right>span").text(quantity);

        notice.append(message);
        if ($noticeCount === 0) {
            height = 10;
        } else {
            height += notice.height() + 50;
        }
        notice.css({
            "position": "fixed",
            "right": 10,
            "top": height + 10,
            "background-color": "white",
            "color": "black",
            "display": "none",
            "padding": 20,
            "z-index": 3
        });
        notice.fadeIn(400);
        $noticeCount++;
        timer = setTimeout(function () {
            if ($("div[id*='notice_0']").is("div") === false) {
                $noticeCount = 0;
            }
            notice.remove();
        }, 2000);
        $("#cart").submit();
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
        $("#IDProduct").val($(this).attr("data"));
        $("#QuantityProduct").val(1);

        var amount = $(".navbar-inverse .fa.fa-shopping-cart.fa-3x").prev();
        amount.text(parseInt(amount.text()) + 1);

        $(".dropdown-menu.pull-right>span").text(amount.text());

        $("body").append("<div id='notice_" + $noticeCount + "'></div>");
        var notice = $("div[id*='notice_" + $noticeCount + "']");
        var message = "Đã thêm 1 <b>" + $(this).parent().children(".productName").text() + "</b> vào giỏ hàng";
        notice.append(message);
        if ($noticeCount === 0) {
            height = 10;
        } else {
            height += notice.height() + 50;
        }
        notice.css({
            "position": "fixed",
            "right": 10,
            "top": height + 10,
            "background-color": "white",
            "color": "black",
            "display": "none",
            "padding": 20,
            "z-index": 3
        });
        notice.fadeIn(400);
        timer = setTimeout(function () {
            if ($("div[id*='notice_0']").is("div") === false) {
                $noticeCount = 0;
            }
            notice.remove();
        }, 2000);
        $noticeCount++;

        $("#cart").submit();
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
