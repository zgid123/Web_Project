// Javascript for Captcha
$("#captcha").click(function () {
    var src = 'Library/cool-php-captcha-0.3.1/captcha.php?' + Math.random();
    $('#captcha').attr('src', src);
});

// Javascript for reg-form
$("#reg-form").ready(function () {
    var $errorCount = 0;

    // For all input when it get focused
    $("input").focus(function () {
        $(this).parent().removeClass("has-error has-success");
    });

    // For username, password and confirm password when pressing key
    $("#reg-username, #reg-password, #reg-password-confirm").keypress(function (e) {
        if ((e.keyCode >= 97 && e.keyCode <= 122) || (e.keyCode >= 65 && e.keyCode <= 90)
                || (e.keyCode >= 48 && e.keyCode <= 57))
            return true;
        return false;
    });

    // For username, password and phone number when it is lost focused
    $("#reg-username, #reg-password, #reg-phoneNumber").blur(function () {
        var value = this.value;
        var parent = $(this).parent();
        var name = parent.find("label").contents().filter(function () {
            return this.nodeType === 3;
        }).text();
        parent.find("div.redColor").remove();
        if (value === "") {
            parent.addClass("has-error");
            parent.append("<div class='redColor'>" + name + " không được rỗng</div>");
            $errorCount = 1;
            return false;
        }
        var minLen;
        switch ($(this).attr("id")) {
            case 'reg-username':
                minLen = 5;
                break;
            case 'reg-password':
                minLen = 6;
                break;
            default:
                minLen = 7;
        }
        if (value.length < minLen) {
            parent.addClass("has-error");
            parent.append("<div class='redColor'>" + name + " phải có ít nhất " + minLen + " ký tự");
            $errorCount = 1;
            return false;
        }
        parent.addClass("has-success");
        $errorCount = 0;
        return true;
    });

    // For only password confirm when it is lost focused
    $("#reg-password-confirm").blur(function () {
        var parent = $(this).parent();
        parent.find("div.redColor").remove();
        if (this.value === "") {
            parent.addClass("has-error");
            parent.append("<div class='redColor'>Mật khẩu xác nhận không được rỗng</div>");
            $errorCount = 1;
            return false;
        }
        var ckValue = $("#reg-password").val();
        if (ckValue !== this.value) {
            parent.addClass("has-error");
            parent.append("<div class='redColor'>Mật khẩu xác nhận phải trùng với mật khẩu</div>");
            $errorCount = 1;
            return false;
        }
        parent.addClass("has-success");
        $errorCount = 0;
        return true;
    });

    // For only mail when it is lost focused
    $("#reg-mail").blur(function () {
        var parent = $(this).parent();
        var regex = /\S+@\S+\.\S+/;
        parent.find("div.redColor").remove();
        if (this.value === "") {
            parent.addClass("has-error");
            parent.append("<div class='redColor'>Mail không được rỗng</div>");
            $errorCount = 1;
            return false;
        }
        if (!regex.test(this.value)) {
            parent.addClass("has-error");
            parent.append("<div class='redColor'>Mail không hợp lệ</div>");
            $errorCount = 1;
            return false;
        }
        parent.addClass("has-success");
        $errorCount = 0;
        return true;
    });

    // For last and first name when it is lost focused
    $("#reg-lastName, #reg-firstName").blur(function () {
        var parent = $(this).parent();
        parent.find("div.redColor").remove();
        var name = parent.find("label").contents().filter(function () {
            return this.nodeType === 3;
        }).text();
        if (this.value === "") {
            parent.addClass("has-error");
            parent.append("<div class='form-control redColor' style='border:0px;'>" + name +
                    " không được rỗng</div>");
            $errorCount = 1;
            return false;
        }
        parent.addClass("has-success");
        $errorCount = 0;
        return true;
    });

    // For only phone number when pressing key
    $("#reg-phoneNumber").keypress(function (e) {
        if (e.keyCode < 48 || e.keyCode > 57)
            return false;
    });

    // For captcha confirm when it is lost focused
    $("#captcha-confirm").blur(function () {
        var parent = $(this).parent();
        var ckValue = $("#captcha").val();
        parent.find("div.redColor").remove();
        var name = parent.find("label").contents().filter(function () {
            return this.nodeType === 3;
        }).text();
        if (ckValue !== this.value) {
            parent.addClass("has-error");
            $errorCount = 1;
            parent.append("<div class='form-control redColor' style='border:0px;'>" + name +
                    " không đúng</div>");
            return false;
        }
        parent.addClass("has-success");
        $errorCount = 0;
        return true;
    });

    // For form when click submit
    $("#reg-form").submit(function () {
        var listRequired = $("#reg-form").find(".required");
        var regHeader = $("#reg-header");
        regHeader.find("div.redColor").remove();
        listRequired.each(function () {
            $errorCount = this.value === "" ? 1 : 0;
            if ($errorCount === 1)
                $(this).parent().addClass("has-error");
        });
        if ($errorCount === 1) {
            regHeader.append("<div class='redColor'>Đăng ký không thành công. Vui lòng nhập đầy đủ thông tin.</div>");
            $('body').animate({
                scrollTop: $("#reg-header").offset().top
            }, 600);
            return false;
        }
        return true;
    });
});