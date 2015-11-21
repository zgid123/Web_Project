<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>Index</title>

        <meta charset="UTF-8" />

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/mycss.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/jquery.realperson.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <div class="header" id="header">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php"><i class="fa fa-home fa-3x"></i></a>

                    <a class="nav navbar-nav navbar-right" href="#"><span class="badge">0</span><i class="fa fa-shopping-cart fa-3x"></i></a>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="register.php">Đăng ký</a></li>
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
        </div>

        <img src="assets/images/banner.jpg" alt=""/>

        <div class="container-fluid" id="body">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills">
                        <li class="active"><a id="productList" href="#">Sản phẩm</a></li>
                        <li><a id="compactCamera" class="noactive" href="#">Máy ảnh Compact</a></li>
                        <li><a id="dslrCamera" class="noactive" href="#">Máy ảnh DSLR</a></li>
                        <li><a id="evilCamera" class="noactive" href="#">Máy ảnh EVIL</a></li>
                        <li><a id="milcCamera" class="noactive" href="#">Máy ảnh MILC</a></li>
                        <li><a id="canonCompany" class="noactive" href="#">Canon</a></li>
                        <li><a id="fujiCompany" class="noactive" href="#">Fujifilm</a></li>
                        <li><a id="nikonCompany" class="noactive" href="#">Nikon</a></li>
                        <li><a id="sonyCompany" class="noactive" href="#">Sony</a></li>
                        <form class="form-inline navbar-right">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Tìm kiếm..." id="searchBar" />
                                <span class="input-group-addon"><span class="fa fa-search fa-lg"></span></span>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div id="left" class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item title">THÔNG TIN LIÊN HỆ</li>
                        <li class="list-group-item center">
                            <p class="title"><i class="fa fa-phone"></i>&emsp;Điện thoại</p>
                            <p>(0623) 883411</p>
                            <p class="title"><i class="fa fa-mobile-phone"></i>&emsp;Di động</p>
                            <p>0122 8856794</p>
                            <p class="title"><i class="fa fa-envelope-o"></i>&emsp;Email</p>
                            <p><a href="mailto:jonasbrother29@yahoo.com">jonasbrother29@yahoo.com</a></p>
                        </li>
                    </ul>

                    <ul class="list-group">
                        <li class="list-group-item title">NHÀ SẢN XUẤT</li>
                        <li class="list-group-item center"> 
                            <a target="_blank" href="http://www.canon.com.vn/home">
                                <img src="assets/images/logo/canon.png" alt=""/>
                            </a>
                        </li>
                        <li class="list-group-item center"> 
                            <a target="_blank" href="http://fujifilm-vietnam.vn/Default.aspx">
                                <img src="assets/images/logo/fuji.png" alt=""/>
                            </a>
                        </li>
                        <li class="list-group-item center">
                            <a target="_blank" href="http://www.nikon.com/">
                                <img src="assets/images/logo/nikon.png" alt=""/>
                            </a>
                        </li>
                        <li class="list-group-item center">
                            <a target="_blank" href="http://www.sony.com.vn/electronics/may-anh">
                                <img src="assets/images/logo/sony.png" alt=""/>
                            </a>
                        </li>
                    </ul>

                    <ul class="list-group">
                        <li class="list-group-item title">LOẠI SẢN PHẨM</li>
                        <a class="list-group-item" href="#">Máy ảnh Compact</a>
                        <a class="list-group-item" href="#">Máy ảnh DSLR</a>
                        <a class="list-group-item" href="#">Máy ảnh EVIL</a>
                        <a class="list-group-item" href="#">Máy ảnh MILC</a>
                        <li class="list-group-item title">HÃNG SẢN XUẤT</li>
                        <a class="list-group-item" href="#">
                            Canon<span class="badge"><i class="fa fa-chevron-circle-right"></i></span>
                        </a>
                        <a class="list-group-item" href="#">Fujifilm<span class="badge"><i class="fa fa-chevron-circle-right"></i></span></a>
                        <a class="list-group-item" href="#">Nikon<span class="badge"><i class="fa fa-chevron-circle-right"></i></span></a>
                        <a class="list-group-item" href="#">Sony<span class="badge"><i class="fa fa-chevron-circle-right"></i></span></a>
                    </ul>
                </div>

                <div class="col-md-9">

                    <form class="reg-form">
                        <div class="panel panel-body">
                            <b>Lưu ý: </b>Các phần dấu * <span class="redColor">màu đỏ</span>
                            là thông tin bắt buộc. Phải điền đầy đủ và chính xác.
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">Thông tin tài khoản</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label><span class="redColor">*</span>Tên tài khoản</label>
                                    <input type="text" class="form-control" id="reg-username" 
                                           placeholder="Tên tài khoản" />
                                </div>
                                <div class="form-group">
                                    <label><span class="redColor">*</span>Mật khẩu</label>
                                    <input type="password" class="form-control" id="reg-password" 
                                           placeholder="Mật khẩu" />
                                </div>
                                <div class="form-group">
                                    <label><span class="redColor">*</span>Nhập lại mật khẩu</label>
                                    <input type="password" class="form-control" id="reg-password-confirm" 
                                           placeholder="Nhập lại mật khẩu" />
                                </div>
                                <div class="form-group">
                                    <label><span class="redColor">*</span>Email</label>
                                    <input type="email" class="form-control" id="reg-mail" 
                                           placeholder="Email" />
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">Thông tin cá nhân</div>
                            <div class="panel-body">
                                <div class="form-group reg-form-group">
                                    <div class="input-group reg-input-group">
                                        <label><span class="redColor">*</span>Họ:</label>
                                        <input type="text" class="form-control" id="reg-lastName" 
                                               placeholder="Họ" /> 
                                    </div>
                                    <div class="input-group reg-input-group">
                                        <label><span class="redColor">*</span>Tên:</label>
                                        <input type="text" class="form-control" id="reg-firstName" 
                                               placeholder="Tên" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><span class="redColor">*</span>Số điện thoại</label>
                                    <input type="text" class="form-control" id="reg-phoneNumber"
                                           placeholder="Số điện thoại" />
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" id="reg-address"
                                           placeholder="Địa chỉ" />
                                </div>
                                <div class="form-group reg-form-group">
                                    <div class="input-group reg-input-group">
                                        <label>Mã xác nhận</label>
                                        <input type="hidden" id="defaultReal"
                                               name="captcha" />
                                    </div>
                                    <div class="input-group reg-input-group">
                                        <label>Xác nhận</label>
                                        <input type="text" class="form-control" id="confirm-captcha" 
                                               name="confirm-captcha" />
                                    </div>
                                </div>
                                <div class="btn-register">
                                    <button type="submit" class="btn btn-danger">
                                        Đăng ký
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div> 
        </div>

        <div class="footer" id="footer">	
            <div class="panel">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <p>Danh mục</p>
                            <p><a href="#productList">Sản phẩm</a></p>
                            <p><a href="#compactCamera">Máy ảnh Compact</a></p>
                            <p><a href="#dslrCamera">Máy ảnh DSLR</a></p>
                            <p><a href="#evilCamera">Máy ảnh EVIL</a></p>
                            <p><a href="#milcCamera">Máy ảnh MILC</a></p>
                        </div>
                        <div class="col-md-2">
                            <p>Nhà sản xuất</p>
                            <p><a href="#canonCompany">Canon</a></p>
                            <p><a href="#fujiCompany">Fujifilm</a></p>
                            <p><a href="#nikonCompany">Nikon</a></p>
                            <p><a href="#sonyCompany">Sony</a></p>
                        </div>
                        <div class="col-md-5">
                            <p class="center">Đồ án môn học</p>
                            <p class="center">&copy; Website bán máy ảnh số</p>
                            <p>Sinh viên thực hiện:&emsp;1362041 - Lê Thái Hòa</p>
                            <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;1362073 - Dương Tấn Huỳnh Phong</p>
                            <p class="center">Môn học: Lập trình web 1</p>
                            <p class="center">Giáo viên hướng dẫn: Ngô Ngọc Đăng Khoa và Nguyễn Đức Huy</p>
                        </div>
                        <div class="col-md-3">
                            <p class="center">Thông tin liên hệ</p>
                            <p>Số điện thoại: (0623) 883411</p>
                            <p>Di động: 0122 8856794</p>
                            <p>Email: <a href="mailto:jonasbrother29@yahoo.com">jonasbrother29@yahoo.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="assets/javascripts/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/jquery.plugin.js" type="text/javascript"></script>
        <script src="assets/javascripts/jquery.realperson.js" type="text/javascript"></script>
        <script>
            $(function () {
                $('#defaultReal').realperson();
            });
        </script>
    </body>

</html>