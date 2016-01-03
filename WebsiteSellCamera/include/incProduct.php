<div id="product" class="list-group">
    <div id="list" class="panel panel-body">
        <?php
        require_once 'entities/Product.php';

        if (isset($_GET["action"]) == true && $_GET["action"] == "product") {
            $allProduct = Product::getProducts();

            $currentPage = basename($_SERVER['PHP_SELF']) . "?action=" . $_GET["action"];
        } else {
            if (isset($_GET["catID"])) {
                $allProduct = Product::getProductsByCatID($action);

                $currentPage = basename($_SERVER['PHP_SELF']) . "?catID=" . $_GET["catID"];
            } elseif (isset($_GET["mf"])) {
                $allProduct = Product::getProductsByMFID($action);

                $currentPage = basename($_SERVER['PHP_SELF']) . "?mf=" . $_GET["mf"];
            } elseif (isset($_GET["series"])) {
                $allProduct = Product::getProductsBySeriesID($action);

                $currentPage = basename($_SERVER['PHP_SELF']) . "?series=" . $_GET["series"];
            }
        }

        if (!isset($allProduct)) {
            echo "Không có sản phẩm";
        } else {
            $page = isset($_GET["page"]) ? $_GET["page"] : 1;
            $pageCount = ceil(count($allProduct) / 12);

            if ($pageCount > 1) {
                $start = $page * 12 - 12;
                $count = $page * 12 <= count($allProduct) ? $page * 12 : ($page * 12) - ($page * 12 - count($allProduct));

                for ($i = $start; $i < $count; $i++) {
                    ?>
                    <div class="product col-md-3">
                        <a class="btnDetail" href="?pro=<?php echo $allProduct[$i]->getProID(); ?>">
                            <i class="fa fa-search-plus"></i>
                        </a>
                        <div class="productImg">
                            <img class = "img-reponsive" src = "<?php echo $allProduct[$i]->getURL(); ?>" alt = ""/>
                        </div>
                        <div id = "" class = "productName">
                            <p><?php echo $allProduct[$i]->getProName(); ?></p>
                        </div>
                        <div id="" class="price">
                            <?php
                            echo number_format($allProduct[$i]->getPrice());
                            echo " VNĐ";
                            ?>
                        </div>
                        <button id="" class="addCart" name="addCart">
                            <i class="fa fa-shopping-cart fa-3x">&emsp;THÊM VÀO GIỎ</i>
                        </button>
                    </div>
                    <?php
                }
            } else {
                for ($i = 0; $i < count($allProduct); $i++) {
                    ?>
                    <div class="product col-md-3">
                        <a class="btnDetail" href="?pro=<?php echo $allProduct[$i]->getProID(); ?>">
                            <i class="fa fa-search-plus"></i>
                        </a>
                        <div class="productImg">
                            <img class = "img-reponsive" src = "<?php echo $allProduct[$i]->getURL(); ?>" alt = ""/>
                        </div>
                        <div id = "" class = "productName">
                            <p><?php echo $allProduct[$i]->getProName(); ?></p>
                        </div>
                        <div id="" class="price">
                            <?php
                            echo number_format($allProduct[$i]->getPrice());
                            echo " VNĐ";
                            ?>
                        </div>
                        <button id="" class="addCart" name="addCart">
                            <i class="fa fa-shopping-cart fa-3x">&emsp;THÊM VÀO GIỎ</i>
                        </button>
                    </div>
                    <?php
                }
            }
        }
        ?>
    </div>
    <?php
    if ($pageCount > 1) {
        ?>
        <div id="paging" class="panel panel-body">
            <ul class="pagination">
                <?php
                if ($page != 1) {
                    ?>
                    <li>
                        <a href="<?php echo $currentPage; ?>&page=1">
                            <label><i class="fa fa-angle-double-left"></i></label>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo $currentPage . "&page=" . ($page - 1); ?>">
                            <label><i class="fa fa-angle-left"></i></label>
                        </a>
                    </li>
                    <?php
                }

                for ($i = 1; $i <= $pageCount; $i++) {
                    ?>
                    <li data="page" class=<?php echo $page == $i ? "active" : ""; ?>>
                        <a <?php echo $page != $i ? "href='$currentPage&page=$i'" : ""; ?>>
                            <label><?php echo $i; ?></label>
                        </a>
                    </li>
                    <?php
                }

                if ($page != $pageCount) {
                    ?>
                    <li>
                        <a href="<?php echo $currentPage . "&page=" . ($page + 1); ?>">
                            <label><i class="fa fa-angle-right"></i></label>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo "$currentPage&page=$pageCount"; ?>">
                            <label><i class="fa fa-angle-double-right"></i></label>
                        </a>
                    </li>
                </ul>
            </div>
            <?php
        }
    }
    ?>
</div>