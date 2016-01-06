<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <form id="cart" method="post" name="cart">
            <input id="IDProduct" name="IDProduct" type="hidden" />
            <input id="QuantityProduct" name="QuantityProduct" type="hidden" />
            <input id="Method" name="Method" type="hidden" />
        </form>
        <a href="?action=cart" class="nav navbar-nav navbar-right">
            <i class="fa fa-shopping-bag fa-3x"><span class="badge"><b><?php echo Cart::count(); ?></b></span></i>
        </a>
        <div class="dropdown">
            <div class="dropdown-menu pull-right">
                <?php
                $amount = Cart::count();
                if ($amount === 0) {
                    ?>
                    <span><?php echo "Chưa có sản phẩm"; ?></span>
                    <?php
                } else {
                    echo "Hiện có ";
                    ?>
                    <span><?php echo "$amount"; ?></span>
                    <?php
                    echo " sản phẩm";
                    ?>
                    <hr />
                    <p>Tổng tiền: <?php echo number_format(Cart::totalPrice()); ?> VNĐ</p>
                    <?php
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

        <form id="login" class="navbar-form navbar-right" method="post">
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

