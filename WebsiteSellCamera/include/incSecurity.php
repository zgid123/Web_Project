<?php
require_once 'Utils/Provider.php';
require_once 'entities/User.php';

$isSuccess;

$user = User::getUserByUsername($_SESSION["Username"]);

if (isset($_POST["security-submit"])) {
    $password = md5($_POST["security-password"]);

    if ($password === $user->getPassword()) {
        $password = md5($_POST["security-newPassword"]);

        $user->setPassword($password);

        $user->updatePassword();

        $isSuccess = true;
    } else {
        $isSuccess = false;
    }
}
?>

<form class="reg-form" id="security-form" method="post">
    <?php
    if (isset($isSuccess) == true) {
        ?>
        <div class="panel panel-body">
            <?php
            if ($isSuccess === true) {
                ?>
                <span class="greenColor">Cập nhật thành công</span>
                <?php
            } else {
                ?>
                <span class="redColor">Sai mật khẩu. Vui lòng thử lại!</span>
                <?php
            }
            ?>
        </div>
        <?php
    }
    ?>

    <div class="panel panel-primary">
        <div class="panel-heading">Đổi mật khẩu</div>

        <div class="panel-body">
            <div class="form-group">
                <label>Mật khẩu hiện tại</label>
                <input type="password" class="form-control required" id="security-password" name="security-password"
                       placeholder="Mật khẩu hiện tại" />
            </div>

            <hr />

            <div class="form-group">
                <label>Mật khẩu mới</label>
                <input type="password" class="form-control required" id="security-newPassword" name="security-newPassword"
                       placeholder="Mật khẩu mới" />
            </div>

            <div class="form-group">
                <label>Xác nhận mật khẩu mới</label>
                <input type="password" class="form-control required" id="security-newPassword-confirm"
                       name="security-newPassword-confirm" placeholder="Xác nhận mật khẩu mới" />
            </div>

            <hr />

            <div class="btn-register">
                <button type="submit" class="btn btn-danger" id="security-submit" name="security-submit" style="display: none;">
                    Cập nhật
                </button>
            </div>
        </div>
    </div>
</form>