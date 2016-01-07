<?php
require_once 'entities/Product.php';
require_once 'entities/Category.php';
require_once 'entities/Manufacturer.php';

$_SESSION["PreviousPage"] = $_SERVER['REQUEST_URI'];

if (isset($_GET["method"])) {
    if (isset($_POST["search-proName"])) {
        $proName = isset($_POST["search-proName"]) ? $_POST["search-proName"] : "";
        $catID = $_POST["search-catID"] !== "" ? $_POST["search-catID"] : 0;
        $mfID = $_POST["search-mfID"] !== "" ? $_POST["search-mfID"] : 0;
        $minPrice = $_POST["search-minPrice"] !== "" ? str_replace(",", "", $_POST["search-minPrice"]) : 0;
        $maxPrice = $_POST["search-maxPrice"] !== "" ? str_replace(",", "", $_POST["search-maxPrice"]) : null;

        $_SESSION["SearchKey"] = array($proName, $catID, $mfID, $minPrice, $maxPrice);
    }

    $allProduct = Product::getProductsBySearchingForAdmin($_SESSION["SearchKey"][0], $_SESSION["SearchKey"][1], $_SESSION["SearchKey"][2], $_SESSION["SearchKey"][3], $_SESSION["SearchKey"][4]);
} else {
    $allProduct = Product::getProductsForAdmin();
}

$currentPage = basename($_SERVER['PHP_SELF']) . "?action=" . $_GET["action"];

$catList = Category::getCategory();
$manufacturerList = Manufacturer::getManufacturer();

$pageCount = 0;
?>

<div id="product" class="list-group">
    <div class="panel-heading">Danh sách sản phẩm</div>
    <div id="list" class="panel panel-body">
        <form class="col-md-12" id="search-bar-form" method="post" action="<?php echo $currentPage; ?>&method=search">
            <ul class="nav nav-pills">
                <li class="">
                    <label>Tìm kiếm:&ensp;</label>
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
                    <a id="search-submit" href="<?php echo $currentPage; ?>&method=search"><i class="fa fa-search"></i></a>
                </li>
            </ul>
        </form>
    </div>

    <div class="panel panel-body">
        <table id="content" class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Hình</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Loại</th>
                    <th>Hãng</th>
                    <th>Còn</th>
                    <th>Bán</th>
                    <th>Xem</th>
                    <th>Trạng thái</th>
                    <th>
                        <a href="?action=add-product" class="btn btn-success" title="Thêm mới" name="product-add">
                            Thêm sản phẩm
                        </a>
                    </th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (!isset($allProduct) || count($allProduct) <= 0) {
                    echo "<p style='padding: 15px;'>Không có sản phẩm</p>";
                } else {
                    $page = isset($_GET["page"]) ? $_GET["page"] : 1;
                    $pageCount = ceil(count($allProduct) / 12);

                    if ($pageCount > 1) {
                        $start = $page * 12 - 12;
                        $count = $page * 12 <= count($allProduct) ? $page * 12 : ($page * 12) - ($page * 12 - count($allProduct));

                        for ($i = $start; $i < $count; $i++) {
                            $removed = $allProduct[$i]->getIsRemoved() == 1 ? true : false;
                            $soldout = $allProduct[$i]->getQuantity() == 0 ? true : false;
                            ?>
                            <tr class="<?php echo $removed === true ? "bg-danger" : "bg-success"; ?>">
                                <td><?php echo $i + 1 ?></td>
                                <td><img class="img-responsive" src="<?php echo $allProduct[$i]->getURL(); ?>" /></td>
                                <td><?php echo $allProduct[$i]->getProName(); ?></td>
                                <td><?php echo $allProduct[$i]->getPrice(); ?></td>
                                <td>
                                    <?php echo Category::getCategoryByID($allProduct[$i]->getCatID())->getCatName(); ?>
                                </td>
                                <td>
                                    <?php echo Manufacturer::getManufacturerByID($allProduct[$i]->getManufacturerID())->getMFName(); ?>
                                </td>
                                <td><?php echo $allProduct[$i]->getQuantity(); ?></td>
                                <td><?php echo $allProduct[$i]->getBought(); ?></td>
                                <td><?php echo $allProduct[$i]->getViewed(); ?></td>
                                <td>
                                    <span class="<?php echo $soldout === true ? "redColor" : "greenColor"; ?>">
                                        <?php echo $soldout === true ? "Hết hàng" : "Còn hàng"; ?>
                                    </span>
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-xs" title="Sửa" name="product-edit" 
                                       href="?pro=<?php echo $allProduct[$i]->getProID(); ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <?php
                                    if ($removed === false) {
                                        ?>
                                        <button type="button" class="btn btn-danger btn-xs" title="Xoá" name="product-remove" 
                                                value="<?php echo $allProduct[$i]->getProID(); ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <?php
                                    } else {
                                        ?>
                                        <button type="button" class="btn btn-info btn-xs" title="Khôi phục" name="product-restore" 
                                                value="<?php echo $allProduct[$i]->getProID(); ?>">
                                            <i class="fa fa-recycle"></i>
                                        </button>
                                        <?php
                                    }
                                    ?>

                                    <a class="btn btn-success btn-xs" title="Thêm mới" name="product-add"
                                       href="?action=add-product">
                                        <i class="fa fa-paperclip"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        for ($i = 0; $i < count($allProduct); $i++) {
                            $removed = $allProduct[$i]->getIsRemoved() == 1 ? true : false;
                            $soldout = $allProduct[$i]->getQuantity() == 0 ? true : false;
                            ?>
                            <tr class="<?php echo $removed === true ? "bg-danger" : "bg-success"; ?>">
                                <td><?php echo $i + 1 ?></td>
                                <td><img class="img-responsive" src="<?php echo $allProduct[$i]->getURL(); ?>" /></td>
                                <td><?php echo $allProduct[$i]->getProName(); ?></td>
                                <td><?php echo $allProduct[$i]->getPrice(); ?></td>
                                <td>
                                    <?php echo Category::getCategoryByID($allProduct[$i]->getCatID())->getCatName(); ?>
                                </td>
                                <td>
                                    <?php echo Manufacturer::getManufacturerByID($allProduct[$i]->getManufacturerID())->getMFName(); ?>
                                </td>
                                <td><?php echo $allProduct[$i]->getQuantity(); ?></td>
                                <td><?php echo $allProduct[$i]->getBought(); ?></td>
                                <td><?php echo $allProduct[$i]->getViewed(); ?></td>
                                <td>
                                    <span class="<?php echo $soldout === true ? "redColor" : "greenColor"; ?>">
                                        <?php echo $soldout === true ? "Hết hàng" : "Còn hàng"; ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="?pro=<?php echo $allProduct[$i]->getProID(); ?>" 
                                       class="btn btn-warning btn-xs" title="Sửa" name="product-edit" >
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <?php
                                    if ($removed === false) {
                                        ?>
                                        <button type="button" class="btn btn-danger btn-xs" title="Xoá" name="product-remove" 
                                                value="<?php echo $allProduct[$i]->getProID(); ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <?php
                                    } else {
                                        ?>
                                        <button type="button" class="btn btn-info btn-xs" title="Khôi phục" name="product-restore" 
                                                value="<?php echo $allProduct[$i]->getProID(); ?>">
                                            <i class="fa fa-recycle"></i>
                                        </button>
                                        <?php
                                    }
                                    ?>

                                    <a class="btn btn-success btn-xs" title="Thêm mới" name="product-add"
                                       href="?action=add-product">
                                        <i class="fa fa-paperclip"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <div id="paging" class="panel panel-body">
        <?php
        if ($pageCount > 1) {
            ?>

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
                    <?php
                }
                ?>
            </ul>
            <?php
        }
        ?>
        <div class="navbar-right">
            <i class="fa fa-square greenColor">:&nbsp;Active</i>
            <i class="fa fa-square redColor">:&nbsp;Deactive</i>
        </div>
    </div>
</div>