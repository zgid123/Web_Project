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
    <!--<a class="list-group-item" href="#">Máy ảnh Compact</a>-->
    <?php
    for ($i = 0; $i < count($catList); $i++) {
        ?>
        <a class="list-group-item" href="?catID=<?php echo $catList[$i]->getCatID(); ?>">
            Máy ảnh <?php echo $catList[$i]->getCatName(); ?>
        </a>
        <?php
    }
    ?>

    <li class="list-group-item title">HÃNG SẢN XUẤT</li>
    <!--<a class="list-group-item dd-right" href="#">Canon<span class="badge"><i class="fa fa-chevron-circle-right"></i></span></a>
    <div class="dropdown">
        <ul class="dropdown-menu">
            <li><a href="#">Dòng máy EOS</a></li>
            <li><a href="#">Dòng máy IXUS</a></li>
            <li><a href="#">Dóng máy ELPH</a></li>
            <li><a href="#">Dòng máy PowerShot</a></li>
        </ul>
    </div>-->
    <?php
    for ($i = 0; $i < count($manufacturerList); $i++) {
        $id = $manufacturerList[$i]->getMFID();
        ?>
        <a class="list-group-item dd-right" href="?mf=<?php echo $id ?>">
            <?php echo $manufacturerList[$i]->getMFName(); ?>
            <span class="badge"><i class="fa fa-chevron-circle-right"></i></span>
        </a>
        <div class="dropdown">
            <ul class="dropdown-menu">
                <?php
                require_once 'entities/Series.php';

                $leftSeriesList = Series::getSeriesByManufactuerID($id);
                for ($j = 0; $j < count($leftSeriesList); $j++) {
                    ?>
                    <li>
                        <a href="?series=<?php echo $leftSeriesList[$j]->getSeriesID(); ?>">
                            Dòng máy <?php echo $leftSeriesList[$j]->getSeriesName(); ?>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <?php
    }
    ?>
</ul>
