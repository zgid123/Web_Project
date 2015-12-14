<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <button class="nav navbar-nav navbar-right">
            <span class="badge"><b>0</b></span><i class="fa fa-shopping-cart fa-3x"></i>
        </button>
        <div class="dropdown">
            <ul class="dropdown-menu pull-right">
                Chưa có sản phẩm
            </ul>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="?action=register" id="register">Đăng ký</a></li>
            <li><button type="button" class="btn btn-link" id="logout">Đăng xuất</button></li>
        </ul>

        <form class="navbar-form navbar-right">
            <div class="form-group">
                <div class="input-group has-feedback col-md-10 header-textbox">
                    <span class="input-group-addon"><span class="fa fa-user fa-lg"></span></span>
                    <input type="text" class="form-control" placeholder="Tên đăng nhập" id="username" />
                </div>
            </div>
            <div class="form-group">
                <div class="input-group has-feedback col-md-10 header-textbox">
                    <span class="input-group-addon"><span class="fa fa-unlock-alt fa-lg"></span></span>
                    <input type="password" class="form-control" placeholder="Mật khẩu" id="password" />        
                </div>
            </div>
            <div class="form-group">
                <div class="btn-group button">
                    <input type="submit" class="btn btn-primary" id="btnLogin" value="Đăng nhập" />
                </div>
            </div>
        </form>
    </div>
</nav>

