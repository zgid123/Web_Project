<?php
require_once 'entities/Category.php';
require_once 'entities/Manufacturer.php';

$category = Category::getCategory();
$manufacturer = Manufacturer::getManufacturer();
?>
<div class="panel">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <p>Danh mục</p>
                <p><a href="?action=product">Sản phẩm</a></p>
                <?php
                for ($i = 0; $i < count($category); $i++) {
                    ?>
                    <p>
                        <a href="?catID=<?php echo $category[$i]->getCatID(); ?>">
                            Máy ảnh <?php echo $category[$i]->getCatName(); ?>
                        </a>
                    </p>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-2">
                <p>Nhà sản xuất</p>
                <?php
                for ($i = 0; $i < count($manufacturer); $i++) {
                    ?>
                    <p>
                        <a href="?mf=<?php echo $manufacturer[$i]->getMFID(); ?>">
                            <?php echo $manufacturer[$i]->getMFName(); ?>
                        </a>
                    </p>
                    <?php
                }
                ?>
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
