<div id="content" class="list-group">
    <li class="list-group-item title">
        SẢN PHẨM MỚI NHẤT
        <a class="badge" href="#carousel-top-10" data-slide="next"><i class="fa fa-chevron-circle-right"></i></a>
        <a class="badge" href="#carousel-top-10" data-slide="prev"><i class="fa fa-chevron-circle-left"></i></a> 
    </li>
    <li class="list-group-item content">
        <div id="carousel-top-10" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <?php
                    require_once 'entities/Product.php';

                    $productList = Product::getProducts("Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn From products Where IsRemoved = 0 Order by UploadDate DESC Limit 10");
                    for ($i = 0; $i < count($productList) / 2; $i++) {
                        $soldout = $productList[$i]->getQuantity() > 0 ? false : true;
                        ?>
                        <div class="product">
                            <a class="btnDetail" href="?pro=<?php echo $productList[$i]->getProID(); ?>">
                                <i class="fa fa-search-plus"></i>
                            </a>
                            <div class="productImg">
                                <?php
                                if ($soldout === true) {
                                    ?>
                                    <img src="assets/images/soldout.png" class="img-responsive img-soldout pull-right" alt=""/>
                                    <?php
                                }
                                ?>
                                <img class = "img-reponsive" src = "<?php echo $productList[$i]->getURL(); ?>" alt = ""/>
                            </div>
                            <div id = "" class = "productName">
                                <p><?php echo $productList[$i]->getProName(); ?></p>
                            </div>
                            <div id="" class="price">
                                <?php
                                echo number_format($productList[$i]->getPrice());
                                echo " VNĐ";
                                ?>
                            </div>
                            <button class="addCart <?php echo $soldout === true ? 'nohover" disabled "' : "" ?>" 
                                    name="addCart" data="<?php echo $productList[$i]->getProID(); ?>">
                                <i class="fa fa-shopping-cart fa-3x">&emsp;THÊM VÀO GIỎ</i>
                            </button>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <div class="item">
                    <?php
                    for ($i = count($productList) / 2; $i < count($productList); $i++) {
                        $soldout = $productList[$i]->getQuantity() > 0 ? false : true;
                        ?>
                        <div class="product">
                            <a class="btnDetail" href="?pro=<?php echo $productList[$i]->getProID(); ?>">
                                <i class="fa fa-search-plus"></i>
                            </a>
                            <div class="productImg">
                                <img class = "img-reponsive" src = "<?php echo $productList[$i]->getURL(); ?>" alt = ""/>
                            </div>
                            <div id = "" class = "productName">
                                <p><?php echo $productList[$i]->getProName(); ?></p>
                            </div>
                            <div id="" class="price">
                                <?php
                                echo number_format($productList[$i]->getPrice());
                                echo " VNĐ";
                                ?>
                            </div>
                            <button id="" class="addCart <?php echo $soldout === true ? 'nohover" disabled "' : "" ?>" 
                                    name="addCart" data="<?php echo $productList[$i]->getProID(); ?>">
                                <i class="fa fa-shopping-cart fa-3x">&emsp;THÊM VÀO GIỎ</i>
                            </button>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </li>

    <li class="list-group-item title">
        SẢN PHẨM ĐƯỢC MUA NHIỀU NHẤT
        <a class="badge" href="#carousel-top-sell" data-slide="next"><i class="fa fa-chevron-circle-right"></i></a>
        <a class="badge" href="#carousel-top-sell" data-slide="prev"><i class="fa fa-chevron-circle-left"></i></a> 
    </li>
    <li class="list-group-item content">
        <div id="carousel-top-sell" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <?php
                    $topSellList = Product::getProducts("Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn From products Where IsRemoved = 0 Order by Bought DESC Limit 10");
                    for ($i = 0; $i < count($topSellList) / 2; $i++) {
                        $soldout = $topSellList[$i]->getQuantity() > 0 ? false : true;
                        ?>
                        <div class="product">
                            <a class="btnDetail" href="?pro=<?php echo $topSellList[$i]->getProID(); ?>">
                                <i class="fa fa-search-plus"></i>
                            </a>
                            <div class="productImg">
                                <?php
                                if ($soldout === true) {
                                    ?>
                                    <img src="assets/images/soldout.png" class="img-responsive img-soldout pull-right" alt=""/>
                                    <?php
                                }
                                ?>
                                <img class = "img-reponsive" src = "<?php echo $topSellList[$i]->getURL(); ?>" alt = ""/>
                            </div>
                            <div id = "" class = "productName">
                                <p><?php echo $topSellList[$i]->getProName(); ?></p>
                            </div>
                            <div id="" class="price">
                                <?php
                                echo number_format($topSellList[$i]->getPrice());
                                echo " VNĐ";
                                ?>
                            </div>
                            <button id="" class="addCart <?php echo $soldout === true ? 'nohover" disabled "' : ""; ?>" 
                                    name="addCart" data="<?php echo $topSellList[$i]->getProID(); ?>">
                                <i class="fa fa-shopping-cart fa-3x">&emsp;THÊM VÀO GIỎ</i>
                            </button>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="item">
                    <?php
                    for ($i = count($topSellList) / 2; $i < count($topSellList); $i++) {
                        $soldout = $topSellList[$i]->getQuantity();
                        ?>
                        <div class="product">
                            <a class="btnDetail" href="?pro=<?php echo $topSellList[$i]->getProID(); ?>">
                                <i class="fa fa-search-plus"></i>
                            </a>
                            <div class="productImg">
                                <?php
                                if ($soldout === true) {
                                    ?>
                                    <img src="assets/images/soldout.png" class="img-responsive img-soldout pull-right" alt=""/>
                                    <?php
                                }
                                ?>
                                <img class = "img-reponsive" src = "<?php echo $topSellList[$i]->getURL(); ?>" alt = ""/>
                            </div>
                            <div id = "" class = "productName">
                                <p><?php echo $topSellList[$i]->getProName(); ?></p>
                            </div>
                            <div id="" class="price">
                                <?php
                                echo number_format($topSellList[$i]->getPrice());
                                echo " VNĐ";
                                ?>
                            </div>
                            <button class="addCart <?php echo $soldout === true ? 'nohover" disabled "' : ""; ?>" 
                                    name="addCart" data="<?php echo $topSellList[$i]->getProID(); ?>">
                                <i class="fa fa-shopping-cart fa-3x">&emsp;THÊM VÀO GIỎ</i>
                            </button>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </li>

    <li class="list-group-item title">
        SẢN PHẨM ĐƯỢC XEM NHIỀU NHẤT
        <a class="badge" href="#carousel-top-view" data-slide="next"><i class="fa fa-chevron-circle-right"></i></a>
        <a class="badge" href="#carousel-top-view" data-slide="prev"><i class="fa fa-chevron-circle-left"></i></a> 
    </li>
    <li class="list-group-item content">
        <div id="carousel-top-view" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <?php
                    $topViewList = Product::getProducts("Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn From products Where IsRemoved = 0 Order by Viewed DESC Limit 10");
                    for ($i = 0; $i < count($topViewList) / 2; $i++) {
                        $soldout = $topViewList[$i]->getQuantity() > 0 ? false : true;
                        ?>
                        <div class="product">
                            <a class="btnDetail" href="?pro=<?php echo $topViewList[$i]->getProID(); ?>">
                                <i class="fa fa-search-plus"></i>
                            </a>
                            <div class="productImg">
                                <?php
                                if ($soldout === true) {
                                    ?>
                                    <img src="assets/images/soldout.png" class="img-responsive img-soldout pull-right" alt=""/>
                                    <?php
                                }
                                ?>
                                <img class = "img-reponsive" src = "<?php echo $topViewList[$i]->getURL(); ?>" alt = ""/>
                            </div>
                            <div id = "" class = "productName">
                                <p><?php echo $topViewList[$i]->getProName(); ?></p>
                            </div>
                            <div id="" class="price">
                                <?php
                                echo number_format($topViewList[$i]->getPrice());
                                echo " VNĐ";
                                ?>
                            </div>
                            <button class="addCart <?php echo $soldout === true ? 'nohover" disabled "' : ""; ?>" 
                                    name="addCart" data="<?php echo $topViewList[$i]->getProID(); ?>">
                                <i class="fa fa-shopping-cart fa-3x">&emsp;THÊM VÀO GIỎ</i>
                            </button>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="item">
                    <?php
                    for ($i = count($topViewList) / 2; $i < count($topViewList); $i++) {
                        $soldout = $topViewList[$i]->getQuantity() > 0 ? false : true;
                        ?>
                        <div class="product">
                            <a class="btnDetail" href="?pro=<?php echo $topViewList[$i]->getProID(); ?>">
                                <i class="fa fa-search-plus"></i>
                            </a>
                            <div class="productImg">
                                <?php
                                if ($soldout === true) {
                                    ?>
                                    <img src="assets/images/soldout.png" class="img-responsive img-soldout pull-right" alt=""/>
                                    <?php
                                }
                                ?>
                                <img class = "img-reponsive" src = "<?php echo $topViewList[$i]->getURL(); ?>" alt = ""/>
                            </div>
                            <div id = "" class = "productName">
                                <p><?php echo $topViewList[$i]->getProName(); ?></p>
                            </div>
                            <div id="" class="price">
                                <?php
                                echo number_format($topViewList[$i]->getPrice());
                                echo " VNĐ";
                                ?>
                            </div>
                            <button class="addCart <?php echo $soldout === true ? 'nohover" disabled "' : ""; ?>" 
                                    name="addCart" data="<?php echo $topViewList[$i]->getProID(); ?>">
                                <i class="fa fa-shopping-cart fa-3x">&emsp;THÊM VÀO GIỎ</i>
                            </button>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </li>
</div>