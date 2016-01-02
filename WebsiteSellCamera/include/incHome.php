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
                    <!--<div class="product">
                        <a class="btnDetail" href="#"><i class="fa fa-search-plus"></i></a>
                        <img class="img-reponsive" src="assets/images/product/DSLR/alpha77ii.jpg" alt=""/>
                        <div id="productName" class="name">Sản phẩm 1</div>
                        <div id="productPrice" class="price">1,900,000 VNĐ</div>
                        <button id="addCart" class="addCart"><i class="fa fa-shopping-cart fa-3x">&emsp;THÊM VÀO GIỎ</i></button>
                    </div>-->
                    <?php
                    require_once 'entities/Product.php';

                    $productList = Product::getProducts("Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn From products Order by UploadDate DESC Limit 10");
                    for ($i = 0; $i < count($productList) / 2; $i++) {
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
                            <button id="" class="addCart" name="addCart">
                                <i class="fa fa-shopping-cart fa-3x">&emsp;THÊM VÀO GIỎ</i>
                            </button>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <div class="item">
                    <!--<div>
                        <img class="img-thumbnail" src="assets/images/logo/canon.png" alt=""/>
                        <div id="productName" class="name">Sản phẩm 6</div>
                        <div id="productPrice" class="price">1,900,000 VNĐ</div>
                        <button id="addCart" class="addCart"><i class="fa fa-shopping-cart fa-3x">&emsp;THÊM VÀO GIỎ</i></button>
                    </div>-->
                    <?php
                    for ($i = count($productList) / 2; $i < count($productList); $i++) {
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
                            <button id="" class="addCart" name="addCart">
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
                    $topSellList = Product::getProducts("Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn From products Order by Bought DESC Limit 10");
                    for ($i = 0; $i < count($topSellList) / 2; $i++) {
                        ?>
                        <div class="product">
                            <a class="btnDetail" href="?pro=<?php echo $topSellList[$i]->getProID(); ?>">
                                <i class="fa fa-search-plus"></i>
                            </a>
                            <div class="productImg">
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
                            <button id="" class="addCart" name="addCart">
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
                        ?>
                        <div class="product">
                            <a class="btnDetail" href="?pro=<?php echo $topSellList[$i]->getProID(); ?>">
                                <i class="fa fa-search-plus"></i>
                            </a>
                            <div class="productImg">
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
                            <button id="" class="addCart" name="addCart">
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
                    $topViewList = Product::getProducts("Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn From products Order by Viewed DESC Limit 10");
                    for ($i = 0; $i < count($topSellList) / 2; $i++) {
                        ?>
                        <div class="product">
                            <a class="btnDetail" href="?pro=<?php echo $topViewList[$i]->getProID(); ?>">
                                <i class="fa fa-search-plus"></i>
                            </a>
                            <div class="productImg">
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
                            <button id="" class="addCart" name="addCart">
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
                        ?>
                        <div class="product">
                            <a class="btnDetail" href="?pro=<?php echo $topViewList[$i]->getProID(); ?>">
                                <i class="fa fa-search-plus"></i>
                            </a>
                            <div class="productImg">
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
                            <button id="" class="addCart" name="addCart">
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