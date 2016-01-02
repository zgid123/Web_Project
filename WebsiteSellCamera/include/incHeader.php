<?php
require_once 'entities/Cart.php';

if (isset($_POST["cart"])) {
    
}
?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <form id="cart" method="post">
            <input id="IDProduct" name="IDProduct" type="hidden" />
            <input id="QuantityProduct" name="QuantityProduct" type="hidden" />
        </form>
        <button class="nav navbar-nav navbar-right">
            <span class="badge"><b>0</b></span><i class="fa fa-shopping-cart fa-3x"></i>
        </button>
        <div class="dropdown">
            <ul class="dropdown-menu pull-right">
                Chưa có sản phẩm
            </ul>
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
                            <a href="#">Chào, <?php echo $user->getFirstName(); ?></a>
                        </li>
                    </ul>
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

