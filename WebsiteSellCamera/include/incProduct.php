<div id="product" class="list-group">

    <?php
    require_once 'entities/Product.php';

    $allProduct = Product::getProduct();
    for ($i = 0; $i < count($allProduct); $i++) {
        ?>
        <li class="list-group-item col-md-3">
            <a class="btnDetail" href="?pro=<?php echo $allProduct[$i]->getProID(); ?>">
                <i class="fa fa-search-plus"></i>
            </a>
            <img class = "img-reponsive" src = "<?php echo $allProduct[$i]->getURL(); ?>" alt = ""/>
            <div id = "" class = "productName">
                <?php echo $allProduct[$i]->getProName(); ?>
            </div>
            <div id="productPrice" class="price">
                <?php
                echo number_format($allProduct[$i]->getPrice());
                echo " VNĐ";
                ?>
            </div>
            <button id="addCart" class="addCart">
                <i class="fa fa-shopping-cart fa-3x">&emsp;THÊM VÀO GIỎ</i>
            </button>
        </li>
        <?php
    }
    ?>

</div>