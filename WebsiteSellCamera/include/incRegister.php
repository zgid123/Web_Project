<form class="reg-form" id="reg-form" method="post">
    <div class="panel panel-body" id="reg-header">
        <p>
            <b>Lưu ý: </b>Các phần dấu * <span class="redColor">màu đỏ</span>
            là thông tin bắt buộc. Phải điền đầy đủ và chính xác.
        </p>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Thông tin tài khoản</div>
        <div class="panel-body">
            <div class="form-group">
                <label><span class="redColor">*</span>Tên tài khoản</label>
                <input type="text" class="form-control required" id="reg-username" name="reg-username"
                       placeholder="Tên tài khoản" />
            </div>
            <div class="form-group">
                <label><span class="redColor">*</span>Mật khẩu</label>
                <input type="password" class="form-control required" id="reg-password" name="reg-password"
                       placeholder="Mật khẩu" />
            </div>
            <div class="form-group">
                <label><span class="redColor">*</span>Nhập lại mật khẩu</label>
                <input type="password" class="form-control required" id="reg-password-confirm"
                       name="reg-password-confirm" placeholder="Nhập lại mật khẩu" />
            </div>
            <div class="form-group">
                <label><span class="redColor">*</span>Email</label>
                <input type="email" class="form-control required" id="reg-mail" name="reg-mail"
                       placeholder="Email" />
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Thông tin cá nhân</div>
        <div class="panel-body">
            <div class="form-group reg-form-group">
                <div class="input-group reg-input-group">
                    <label><span class="redColor">*</span>Họ</label>
                    <input type="text" class="form-control required" id="reg-lastName" name="reg-lastName"
                           placeholder="Họ" /> 
                </div>
                <div class="input-group reg-input-group">
                    <label><span class="redColor">*</span>Tên</label>
                    <input type="text" class="form-control required" id="reg-firstName" name="reg-firstName"
                           placeholder="Tên" />
                </div>
            </div>
            <div class="form-group">
                <label><span class="redColor">*</span>Số điện thoại</label>
                <input type="text" class="form-control required" id="reg-phoneNumber" name="reg-phoneNumber"
                       placeholder="Số điện thoại" maxlength="12" />
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" class="form-control" id="reg-address" name="reg-address"
                       placeholder="Địa chỉ" />
            </div>
            <div class="form-group reg-form-group">
                <div class="input-group reg-input-group">
                    <label>Mã xác nhận</label>
                    <input type="hidden" id="captcha"
                           name="captcha" />
                </div>
                <div class="input-group reg-input-group">
                    <label><span class="redColor">*</span>Xác nhận</label>
                    <input type="text" class="form-control required" id="captcha-confirm" 
                           name="captcha-confirm" />
                </div>
            </div>
            <div class="btn-register">
                <button type="submit" class="btn btn-danger" id="reg-submit" name="reg-submit">
                    Đăng ký
                </button>
            </div>
        </div>
    </div>
</form>