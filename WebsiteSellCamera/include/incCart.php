<?php
require_once 'Utils/Provider.php';
require_once 'entities/User.php';
require_once 'entities/Product.php';
require_once 'entities/Cart.php';
require_once 'entities/Category.php';

if (isset($_SESSION["Username"])) {
    $hasLogin = true;
} else {
    $hasLogin = false;
}

$total = 0;
?>

<form class="cart-form" id="cart-form" method="post">
    <?php
    if ($paySuccess === true) {
        ?>
        <div class="panel panel-body">
            <span class="greenColor">Đặt hàng thành công.</span>
        </div>
        <?php
    }

    $paySuccess = false;
    ?>

    <div class="panel panel-primary">
        <div class="panel-heading">Giỏ hàng</div>
        <div id="cart-form-title" class="panel-body">
            <div class="title">
                <div class="col-md-1">Hình</div>
                <div class="col-md-3">Tên sản phẩm</div>
                <div class="col-md-1">Loại</div>
                <div class="col-md-2">Giá</div>
                <div class="col-md-2">Số lượng</div>
                <div class="col-md-2">Thành tiền</div>
                <div class="col-md-1">&nbsp;</div>
            </div>
        </div>

        <hr class="hr-heading" />

        <div id="cart-form-content" class="panel-body">
            <?php
            foreach ($_SESSION["Cart"] as $proID => $Quantity) {
                $product = Product::getProductByID($proID);
                $amount = $product->getPrice() * $Quantity;
                $category = Category::getCategoryByID($product->getCatID());
                ?>
                <div class="content row">
                    <div class="col-md-1">
                        <img class="img-responsive" src="<?php echo $product->getURL(); ?>" alt=""/>
                    </div>

                    <div class="col-md-3 cart-text"><?php echo $product->getProName(); ?></div>

                    <div class="col-md-1 cart-text"><?php echo $category->getCatName(); ?></div>

                    <div class="col-md-2 cart-text" data="<?php echo $product->getPrice(); ?>">
                        <?php echo number_format($product->getPrice()); ?>
                    </div>

                    <div class="col-md-2 cart-text">
                        <div class="cart-numericUpDown">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" name="cart-decrease" class="btn btn-default">-</button>
                                </span>

                                <input type="text" class="form-control" placeholder="" name="cart-quantity" 
                                       value="<?php echo $Quantity; ?>" max="<?php echo $product->getQuantity(); ?>" />

                                <span class="input-group-btn">
                                    <button type="button" name="cart-increase" class="btn btn-default">+</button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 cart-text"><?php echo number_format($amount); ?></div>

                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-xs btn-remove" title="Xoá" name="cart-remove" 
                                data-proid="<?php echo $proID; ?>">
                            <i class="fa fa-remove"></i>
                        </button>
                    </div>
                </div>
                <?php
                $total += $amount;
                ?>
                <hr class="hr-content" />
                <?php
            }
            ?>
            <div id="total" class="col-md-offset-5 title">
                Tổng tiền: 
                <span class="redColor"><?php echo number_format($total); ?></span>
                <span class="redColor"> VNĐ</span>
            </div>
        </div>

        <div id="cart-form-button" class="panel-body">
            <a class="btn btn-success col-md-offset-1" href="<?php echo $_SESSION["PreviousPage"]; ?>">
                <i class="fa fa-mail-reply"></i>&ensp;Tiếp tục mua hàng
            </a>
            <?php
            if ($hasLogin === true) {
                ?>
                <button type="submit" id="btnPay" name="btnPay" class="btn btn-danger col-md-offset-4" 
                        value="<?php echo number_format($total); ?>">
                    <i class="fa fa-btc"></i>&ensp;Thanh toán
                </button>
                <?php
            }
            ?>
        </div>
    </div>
</form>