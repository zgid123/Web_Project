<?php
require_once 'entities/Cart.php';
require_once 'entities/Product.php';

if (isset($_POST["IDProduct"])) {
    Cart::addItem($_POST["IDProduct"], $_POST["QuantityProduct"]);
}
?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <form id="cart" method="post" name="cart">
            <input id="IDProduct" name="IDProduct" type="hidden" />
            <input id="QuantityProduct" name="QuantityProduct" type="hidden" />
        </form>
        <a href="?action=cart" class="nav navbar-nav navbar-right">
            <span class="badge"><b><?php echo Cart::count(); ?></b></span><i class="fa fa-shopping-cart fa-3x"></i>
        </a>
        <div class="dropdown">
            <div class="dropdown-menu pull-right">
                <?php
                $amount = Cart::count();
                if ($amount === 0) {
                    echo "Chưa có sản phẩm";
                } else {
                    echo "Hiện có ";
                    ?>
                    <span><?php echo "$amount"; ?></span>
                    <?php
                    echo " sản phẩm";
                }
                ?>
            </div>
        </div>

        <ul class = "nav navbar-nav navbar-right">
            <?php
            if (Provider::IsLogged() === false) {
                ?>
                <li><a href = "?action=register" id = "register">Đăng ký</a></li>
                <?php
            }
            ?>
        </ul>

        <form class="navbar-form navbar-right" method="post">
            <?php
            if (Provider::IsLogged() === false) {
                ?>
                <div class="form-group">
                    <div class="input-group has-feedback col-md-10 header-textbox">
                        <span class="input-group-addon"><span class="fa fa-user fa-lg"></span></span>
                        <input type="text" class="form-control" placeholder="Tên đăng nhập" id="username" name="username" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group has-feedback col-md-10 header-textbox">
                        <span class="input-group-addon"><span class="fa fa-unlock-alt fa-lg"></span></span>
                        <input type="password" class="form-control" placeholder="Mật khẩu" id="password" name="password" />        
                    </div>
                </div>
                <?php
            } else {
                $user = User::getUserByUsername($_SESSION["Username"]);
                ?>
                <div class="form-group">
                    <ul id="userName" class="nav nav-tabs">
                        <li role="presentation" class="">
                            <label>Chào, <?php echo $user->getFirstName(); ?></label>
                        </li>
                    </ul>

                    <div class="dropdown">
                        <ul class="dropdown-menu">
                            <li><a href="?action=profile">Thông tin cá nhân</a></li>

                            <li><a href="?action=security">Đổi mật khẩu</a></li>
                        </ul>
                    </div>
                </div>
                <?php
            }
            ?>

            <div class="form-group">
                <?php
                if (Provider::IsLogged() === false) {
                    ?>
                    <div class="btn-group button">
                        <input type="submit" class="btn btn-primary" id="btnLogin" name="btnLogin" value="Đăng nhập" />
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="btn-group button">
                        <input type="submit" class="btn btn-primary" id="btnLogout" name="btnLogout" value="Đăng xuất" />
                    </div>
                    <?php
                }
                ?>
            </div>
        </form>
    </div>
</nav>

