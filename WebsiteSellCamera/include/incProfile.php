<?php
require_once 'Utils/Provider.php';
require_once 'entities/User.php';

$isSuccess = false;

$user = User::getUserByUsername($_SESSION["Username"]);

if (isset($_POST["profile-submit"])) {
    $user->setAddress($_POST["profile-address"]);
    $user->setEmail($_POST["profile-mail"]);
    $user->setFirstName($_POST["profile-firstName"]);
    $user->setLastName($_POST["profile-lastName"]);
    $user->setPhoneNumber($_POST["profile-phoneNumber"]);

    $user->updateInfor();
    $isSuccess = true;
}
?>

<form class="reg-form" id="profile-form" method="post">
    <?php
    if ($isSuccess === true) {
        ?>
        <div class = "panel panel-body">
            <p>
                <span class = "greenColor">Cập nhật thành công</span>
            </p>
        </div>
        <?php
        $isSuccess = false;
    }
    ?>
    <div class="panel panel-primary">
        <div class="panel-heading">Thông tin tài khoản</div>
        <div class="panel-body">
            <div class="form-group">
                <label>Tên tài khoản</label>
                <input type="text" class="form-control required" id="profile-username" name="profile-username"
                       value="<?php echo $user->getUsername(); ?>" placeholder="Tên tài khoản" readonly />
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control required" id="profile-mail" name="profile-mail"
                       value="<?php echo $user->getEmail(); ?>" placeholder="Email" />
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Thông tin cá nhân</div>
        <div class="panel-body">
            <div class="form-group reg-form-group">
                <div class="input-group reg-input-group">
                    <label>Họ</label>
                    <input type="text" class="form-control required" id="profile-lastName" name="profile-lastName"
                           value="<?php echo $user->getLastName(); ?>" placeholder="Họ" /> 
                </div>

                <div class="input-group reg-input-group">
                    <label>Tên</label>
                    <input type="text" class="form-control required" id="profile-firstName" name="profile-firstName"
                           value="<?php echo $user->getFirstName(); ?>" placeholder="Tên" />
                </div>
            </div>

            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" class="form-control required" id="profile-phoneNumber" name="profile-phoneNumber"
                       value="<?php echo $user->getPhoneNumber(); ?>" placeholder="Số điện thoại" maxlength="12" />
            </div>

            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" class="form-control" id="profile-address" name="profile-address"
                       value="<?php echo $user->getAddress(); ?>" placeholder="Địa chỉ" />
            </div>

            <div class="btn-register">
                <button type="submit" class="btn btn-danger" id="profile-submit" name="profile-submit">
                    Cập nhật
                </button>
            </div>
        </div>
    </div>
</form>