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

    // Javascript for Header
    $("#login").submit(function () {
        if ($("#username").val() === "" || $("#password").val() === "") {
            return false;
        }
    });

    $("a.nav.navbar-nav.navbar-right").mousemove(function () {
        var next = $(this).next();
        var top = $(this).height();
        next.addClass("open");
        next.css({
            "right": 0,
            "top": top + 1
        });
    });

    $("a.nav.navbar-nav.navbar-right").mouseout(function () {
        $(this).next().removeClass("open");
    });

    $(".navbar navbar-inverse .dropdown").mouseout(function () {
        $(this).removeClass("open");
    });

    $("#userName.nav.nav-tabs").mousemove(function () {
        var next = $(this).next();
        var top = $(this).height() + 9;
        var left = $(this).position().left + next.children().width();
        next.addClass("open");
        next.css({
            "top": top,
            "left": left
        });
    });

    $("#userName.nav.nav-tabs").mouseout(function () {
        $(this).next().removeClass("open");
    });

    //Javascript for Profile page
    $("#profile-form").submit(function () {
        var errorCount;
        var listRequired = $(this).find(".required");
        listRequired.each(function () {
            errorCount = $(this).val() === "" ? 1 : 0;
            if (errorCount === 1)
                $(this).parent().addClass("has-error");
        });
        errorCount = $(this).find(".has-error").length;
        if (errorCount >= 1) {
            $('body').animate({
                scrollTop: $(this).offset().top
            }, 600);
            errorCount = false;
            return false;
        }
    });

    //Javascript for Security page
    $("#security-newPassword-confirm").keyup(function () {
        var password = $("#security-newPassword").val();
        var error = $("#security-form").find(".has-error");

        if (error.length === 0) {
            if ($(this).val() !== "" && $(this).val() === password) {
                $("#security-submit").show();
            } else {
                $("#security-submit").hide();
            }
        }
    });

    $("#security-newPassword").keyup(function () {
        var password = $("#security-newPassword-confirm").val();
        if ($(this).val() === password) {
            $("#security-newPassword-confirm").parent().removeClass("has-error").addClass("has-success")
                    .find("div.redColor").remove();
        }

        var error = $("#security-form").find(".has-error");

        if (error.length === 0) {
            if ($(this).val() !== "" && $(this).val() === password) {
                $("#security-submit").show();
            } else {
                $("#security-submit").hide();
            }
        }
    });

    $("#security-newPassword-confirm, #security-newPassword").keypress(function (e) {
        if ((e.keyCode >= 97 && e.keyCode <= 122) || (e.keyCode >= 65 && e.keyCode <= 90)
                || (e.keyCode >= 48 && e.keyCode <= 57))
            return true;
        return false;
    });

    $("#security-newPassword").blur(function () {
        var value = $(this).val();
        var parent = $(this).parent();
        var name = parent.find("label").contents().filter(function () {
            return this.nodeType === 3;
        }).text();
        parent.find("div.redColor").remove();
        if (value === "") {
            parent.addClass("has-error");
            parent.append("<div class='redColor'>" + name + " không được rỗng</div>");
            return false;
        }
        var minLen = 6;
        if (value.length < minLen) {
            parent.addClass("has-error");
            parent.append("<div class='redColor'>" + name + " phải có ít nhất " + minLen + " ký tự</div>");
            return false;
        }
        parent.addClass("has-success");
        return true;
    });

    $("#security-newPassword-confirm").blur(function () {
        var parent = $(this).parent();
        parent.find("div.redColor").remove();
        if (this.value === "") {
            parent.addClass("has-error");
            parent.append("<div class='redColor'>Mật khẩu xác nhận không được rỗng</div>");
            return false;
        }
        var ckValue = $("#security-newPassword").val();
        if (ckValue !== this.value) {
            parent.addClass("has-error");
            parent.append("<div class='redColor'>Mật khẩu xác nhận phải trùng với mật khẩu</div>");
            return false;
        }
        parent.addClass("has-success");
        return true;
    });
});
