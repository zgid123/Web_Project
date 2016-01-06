<ul id="top" class="nav nav-pills">
    <li><a class="forFA" href="index.php"><i class="fa fa-home fa-2x"></i></a></li>
    <li><a id="productList" class="" href="?action=product">Sản phẩm</a></li>
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
    <li id="top-search" class="navbar-right">
        <a class="btn btn-primary" role="button" data-toggle="collapse" href="#search-bar-form" aria-expanded="false" 
           aria-controls="">
            Tìm kiếm&emsp;<i class="fa fa-caret-square-o-down"></i> 
        </a>
    </li>
</ul>

<form class="col-md-12 collapse" id="search-bar-form" method="post" action="?action=search">
    <ul class="nav nav-pills">
        <li class="">
            <label>Tìm kiếm:&emsp;</label>
        </li>

        <li class="">
            <input id="search-proName" name="search-proName" type="text" class="form-control" placeholder="Tên sản phẩm" />
        </li>

        <li class="">
            <label>Loại:&ensp;</label>

            <select id="search-catID" name="search-catID">
                <option value="0"></option>
                <?php
                for ($i = 0; $i < count($catList); $i++) {
                    ?>
                    <option value="<?php echo $catList[$i]->getCatID(); ?>">
                        <?php echo $catList[$i]->getCatName(); ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </li>

        <li class="">
            <label>Hãng:&ensp;</label>

            <select id="search-mfID" name="search-mfID">
                <option value="0"></option>
                <?php
                for ($i = 0; $i < count($manufacturerList); $i++) {
                    ?>
                    <option value="<?php echo $manufacturerList[$i]->getMFID(); ?>">
                        <?php echo $manufacturerList[$i]->getMFName(); ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </li>

        <li>
            <label>Giá:</label>
        </li>

        <li>
            <input id="search-minPrice" name="search-minPrice" type="text" class="form-control" placeholder="Từ..." />
        </li>

        <li class="tinySpace">
            <label>-</label>
        </li>

        <li>
            <input id="search-maxPrice" name="search-maxPrice" type="text" class="form-control" placeholder="Đến..." />
        </li>

        <li>
            <a id="search-submit" href="?action=search"><i class="fa fa-search"></i></a>
        </li>
    </ul>
</form>

