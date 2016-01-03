<ul class="nav nav-pills">
    <li><a class="forFA" href="index.php"><i class="fa fa-home fa-2x"></i></a></li>
    <li><a id="productList" class="" href="?action=product">Sản phẩm</a></li>
    <!--<li><a id="compactCamera" class="" href="#">Máy ảnh Compact</a></li>-->
    <?php
    require_once 'entities/Category.php';

    $catList = Category::getCategory();
    for ($i = 0; $i < count($catList); $i++) {
        ?>
        <li>
            <a id="compactCamera" class="" href="?catID=<?php echo $catList[$i]->getCatID(); ?>">
                Máy ảnh <?php echo $catList[$i]->getCatName(); ?>
            </a>
        </li>
        <?php
    }
    ?>
    <!--<li class="dropdown">
            <a id="canonCompany" href="#">Canon</a>
            <ul class="dropdown-menu">
                <li><a href="#">Dòng máy EOS</a></li>
                <li><a href="#">Dòng máy IXUS</a></li>
                <li><a href="#">Dóng máy ELPH</a></li>
                <li><a href="#">Dòng máy PowerShot</a></li>
            </ul>
        </li>-->
    <?php
    require_once 'entities/Manufacturer.php';

    $manufacturerList = Manufacturer::getManufacturer();
    for ($i = 0; $i < count($manufacturerList); $i++) {
        $id = $manufacturerList[$i]->getMFID();
        ?>
        <li class="dropdown">
            <a id="<?php echo $manufacturerList[$i]->getMFName(); ?>Company" href="?mf=<?php echo $id ?>">
                <?php echo $manufacturerList[$i]->getMFName(); ?>
            </a>
            <ul class="dropdown-menu">
                <?php
                require_once 'entities/Series.php';

                $seriesList = Series::getSeriesByManufactuerID($id);
                for ($j = 0; $j < count($seriesList); $j++) {
                    ?>
                    <li>
                        <a href="?series=<?php echo $seriesList[$j]->getSeriesID(); ?>">
                            Dòng máy <?php echo $seriesList[$j]->getSeriesName(); ?>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </li>
        <?php
    }
    ?>
    <form class="form-inline navbar-right">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Tìm kiếm..." id="searchBar" />
            <span class="input-group-addon"><a href="?action=search" class="fa fa-search fa-lg"></a></span>
        </div>
    </form>
</ul>

