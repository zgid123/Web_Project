<div id="product" class="list-group">
    <div class="panel panel-body">
        <?php
        require_once 'entities/Product.php';

        if ($action == "product") {
            $allProduct = Product::getProducts();
        } else {
            if (isset($_GET["catID"])) {
                $allProduct = Product::getProductsByCatID($action);
            } elseif (isset($_GET["mf"])) {
                $allProduct = Product::getProductsByMFID($action);
            } else {
                $allProduct = Product::getProductsBySeriesID($action);
            }
        }

        if (!isset($allProduct)) {
            echo "Không có sản phẩm";
        } else {
            for ($i = 0; $i < count($allProduct); $i++) {
                ?>
                <div class="product col-md-3">
                    <a class="btnDetail" href="?pro=<?php echo $allProduct[$i]->getProID(); ?>">
                        <i class="fa fa-search-plus"></i>
                    </a>
                    <img class = "img-reponsive" src = "<?php echo $allProduct[$i]->getURL(); ?>" alt = ""/>
                    <div id = "" class = "productName">
                        <p><?php echo $allProduct[$i]->getProName(); ?></p>
                    </div>
                    <div id="" class="price">
                        <?php
                        echo number_format($allProduct[$i]->getPrice());
                        echo " VNĐ";
                        ?>
                    </div>
                    <button id="" class="addCart">
                        <i class="fa fa-shopping-cart fa-3x">&emsp;THÊM VÀO GIỎ</i>
                    </button>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>