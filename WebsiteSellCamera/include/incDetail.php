<div id="detail" class="list-group">
    <div class="panel panel-body">
        <?php
        require_once 'entities/Product.php';
        require_once 'entities/Manufacturer.php';
        require_once 'entities/Category.php';
        $_SESSION["PreviousPage"] = $_SERVER['REQUEST_URI'];

        Product::updateProductViewed($action);

        $product = Product::getProductByID($action);
        $manufacturer = Manufacturer::getManufacturerByID($product->getManufacturerID());
        $category = Category::getCategoryByID($product->getCatID());
        ?>

        <div class="panel-heading">
            <div id="productName" class="panel-title">
                <?php echo $product->getProName(); ?>
            </div>

            <div class="panel-body">
                <div id="productInfor">
                    <div id="productImg" class="col-md-3">
                        <img class = "img-reponsive" src = "<?php echo $product->getURL(); ?>" alt = ""/>
                    </div>

                    <div id="productNote" class="col-md-9">
                        <div class="col-md-12">
                            <div class="col-md-7">
                                <p>Nhà sản xuất: <?php echo $manufacturer->getMFName(); ?></p>
                                <p>Xuất xứ: <?php echo $product->getMadeIn(); ?></p>
                                <p>Loại: <?php echo $category->getCatName(); ?></p>
                                <p>
                                    Giá: 
                                    <span class="redColor">
                                        <b>
                                            <?php
                                            echo number_format($product->getPrice());
                                            echo " VNĐ";
                                            ?>
                                        </b>
                                    </span>
                                </p>
                            </div>

                            <div class="col-md-5">
                                <p>Số lượt xem: <?php echo $product->getViewed(); ?></p>
                                <p>Số lượng bán: <?php echo $product->getBought(); ?></p>
                                <p>
                                    Tình trạng: 
                                    <?php
                                    if ($product->getQuantity() > 0) {
                                        $isEnable = true;
                                        ?>
                                        <span class="greenColor"><?php echo "Còn hàng"; ?></span>
                                        <?php
                                    } else {
                                        $isEnable = false;
                                        ?>
                                        <span class="redColor"><?php echo "Hết hàng"; ?></span>
                                        <?php
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div id="numericUpDown" class="form-group col-md-6">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button id="decrease" class="btn btn-default">-</button>
                                    </span>
                                    <input type="text" class="form-control" placeholder="" id="productQuantity" value="1" />
                                    <span class="input-group-btn">
                                        <button id="increase" class="btn btn-default">+</button>
                                    </span>
                                </div>
                            </div>

                            <div id="btnAddCart" class="form-group col-md-6">
                                <button id="" class="addCart <?php echo $isEnable === true ? "" : 'nohover" disabled "'; ?>" 
                                        name="addCart" data="<?php echo $product->getProID(); ?>" >
                                    <i class="fa fa-shopping-cart fa-3x">&emsp;THÊM VÀO GIỎ</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-heading">
            <div id="productDescribe" class="panel-title">
                Mô tả
            </div>

            <div class="panel-body">
                <div id="productDetail">
                    <?php
                    echo $product->getFullDes();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="similarProduct" class="list-group">
    <li class="list-group-item title">
        <span>Sản phẩm cùng loại</span>
        <a class="badge" href="#carousel-similar" data-slide="next"><i class="fa fa-chevron-circle-right"></i></a>
        <a class="badge" href="#carousel-similar" data-slide="prev"><i class="fa fa-chevron-circle-left"></i></a> 
    </li>
    <li class="list-group-item content">
        <div id="carousel-similar" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <?php
                    require_once 'entities/Product.php';

                    $similarProduct = Product::get5ProductsByCatID($product->getCatID(), $product->getProID());
                    for ($i = 0; $i < count($similarProduct); $i++) {
                        if ($similarProduct[$i]->getQuantity() > 0) {
                            $isEnable = true;
                        } else {
                            $isEnable = false;
                        }
                        ?>
                        <div class="product">
                            <a class="btnDetail" href="?pro=<?php echo $similarProduct[$i]->getProID(); ?>">
                                <i class="fa fa-search-plus"></i>
                            </a>
                            <div class="productImg">
                                <img class = "img-reponsive" src = "<?php echo $similarProduct[$i]->getURL(); ?>" alt = ""/>
                            </div>
                            <div id = "" class = "productName">
                                <p><?php echo $similarProduct[$i]->getProName(); ?></p>
                            </div>
                            <div id="" class="price">
                                <?php
                                echo number_format($similarProduct[$i]->getPrice());
                                echo " VNĐ";
                                ?>
                            </div>
                            <button id="" class="addCart <?php echo $isEnable === true ? "" : 'nohover" disabled "'; ?>" 
                                    name="addCart" data="<?php echo $similarProduct[$i]->getProID(); ?>">
                                <i class="fa fa-shopping-cart fa-3x">&emsp;THÊM VÀO GIỎ</i>
                            </button>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <div class="item">
                    <?php
                    $similarProduct = Product::get5ProductsByMFID($product->getManufacturerID(), $product->getProID());

                    for ($i = 0; $i < count($similarProduct); $i++) {
                        if ($similarProduct[$i]->getQuantity() > 0) {
                            $isEnable = true;
                        } else {
                            $isEnable = false;
                        }
                        ?>
                        <div class="product">
                            <a class="btnDetail" href="?pro=<?php echo $similarProduct[$i]->getProID(); ?>">
                                <i class="fa fa-search-plus"></i>
                            </a>
                            <div class="productImg">
                                <img class = "img-reponsive" src = "<?php echo $similarProduct[$i]->getURL(); ?>" alt = ""/>
                            </div>
                            <div id = "" class = "productName">
                                <p><?php echo $similarProduct[$i]->getProName(); ?></p>
                            </div>
                            <div id="" class="price">
                                <?php
                                echo number_format($similarProduct[$i]->getPrice());
                                echo " VNĐ";
                                ?>
                            </div>
                            <button id="" class="addCart <?php echo $isEnable === true ? "" : 'nohover" disabled "'; ?>" 
                                    name="addCart" data="<?php echo $similarProduct[$i]->getProID(); ?>">
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
