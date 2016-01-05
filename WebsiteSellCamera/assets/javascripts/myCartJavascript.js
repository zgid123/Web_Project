$("#cart-form").on("click", "button[name*='cart-decrease']", function () {
    var input = $(this).parent().next();
    var amount = parseInt(input.val());

    if (amount > 1) {
        amount--;
        input.val(amount);
    }

    input.change();
});

$("#cart-form").on("click", "button[name*='cart-increase']", function () {
    var input = $(this).parent().prev();
    var amount = parseInt(input.val());

    amount++;

    if (amount <= input.attr("max")) {
        input.val(amount);

        input.change();
    }
});

$("#cart-form").on("change", "input[name*='cart-quantity']", function () {
    $("#cart>#IDProduct").val($(this).parents(".content.row").find("button[name='cart-remove']").attr("data-proid"));
    $("#cart>#QuantityProduct").val($(this).val());
    $("#cart>#Method").val("Update");

    $("#cart").submit();
});

$("#cart-form").on("click", "button[name='cart-remove']", function () {
    $("#cart>#IDProduct").val($(this).attr("data-proid"));
    $("#cart>#Method").val("Remove");

    $("#cart").submit();
});

var enableSubmit = true;

$("#cart-form").submit(function () {
    $("#cart-form input[name*='cart-quantity']").keypress();

    return enableSubmit;
});

$("#cart-form").on("keypress", "input[name*='cart-quantity']", function (e) {
    if (e.keyCode == 13) {
        enableSubmit = false;
    }
});

$("#cart-form").on("click", "#btnPay", function (e) {
    if ($(this).val() == 0) {
        e.preventDefault();
    }
});