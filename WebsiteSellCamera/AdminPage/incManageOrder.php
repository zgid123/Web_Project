<?php
require_once 'entities/Order.php';
require_once 'entities/User.php';

$_SESSION["PreviousPage"] = $_SERVER['REQUEST_URI'];

if (isset($_GET["method"])) {
    if (isset($_POST["search-order"])) {
        $_SESSION["SearchKey"] = $_POST["search-order"];
    }

    $order = Order::getOrderBySearching($_SESSION["SearchKey"]);
} else {
    $order = Order::getOrder();
}

$currentPage = basename($_SERVER['PHP_SELF']) . "?action=" . $_GET["action"];

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
                    <input id="search-order" name="search-order" type="text" class="form-control datepicker" placeholder="dd/mm/yyyy" />
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
                    <th>Ngày lập</th>
                    <th>Người mua</th>
                    <th>Tổng tiền</th>
                    <th>&emsp;</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (!isset($order) || count($order) <= 0) {
                    echo "<p style='padding: 15px;'>Không có hóa đơn</p>";
                } else {
                    $page = isset($_GET["page"]) ? $_GET["page"] : 1;
                    $pageCount = ceil(count($order) / 12);

                    if ($pageCount > 1) {
                        $start = $page * 12 - 12;
                        $count = $page * 12 <= count($order) ? $page * 12 : ($page * 12) - ($page * 12 - count($order));

                        for ($i = $start; $i < $count; $i++) {
                            $delivered = $order[$i]->getDelivered() == 1 ? true : false;
                            ?>
                            <tr class="<?php echo $delivered === false ? "bg-danger" : "bg-success"; ?>">
                                <td><?php echo $i + 1 ?></td>
                                <td><?php echo date("d/m/Y H:i:s", strtotime($order[$i]->getOrderDate())); ?></td>
                                <td>
                                    <?php echo User::getNameByUserID($order[$i]->getUserID()); ?>
                                </td>
                                <td>
                                    <?php echo number_format($order[$i]->getTotal()); ?>
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-xs" title="Sửa" name="order-view" 
                                       href="?order=<?php echo $order[$i]->getOrderID(); ?>">
                                        <i class="fa fa-eye" style="width: auto;"></i>
                                    </a>

                                    <?php
                                    if ($delivered === false) {
                                        ?>
                                        <button type="button" class="btn btn-danger btn-xs" title="Đã giao" name="order-delivered" 
                                                value="<?php echo $order[$i]->getOrderID(); ?>">
                                            <i class="fa fa-ship" style="width: auto;"></i>
                                        </button>
                                        <?php
                                    } else {
                                        ?>
                                        <button type="button" class="btn btn-info btn-xs" title="Chưa giao" name="order-undelivered" 
                                                value="<?php echo $order[$i]->getOrderID(); ?>">
                                            <i class="fa fa-recycle" style="width: auto;"></i>
                                        </button>
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        for ($i = 0; $i < count($order); $i++) {
                            $delivered = $order[$i]->getDelivered() == 1 ? true : false;
                            ?>
                            <tr class="<?php echo $delivered === false ? "bg-danger" : "bg-success"; ?>">
                                <td><?php echo $i + 1 ?></td>
                                <td><?php echo date("d/m/Y H:i:s", strtotime($order[$i]->getOrderDate())); ?></td>
                                <td>
                                    <?php echo User::getNameByUserID($order[$i]->getUserID()); ?>
                                </td>
                                <td>
                                    <?php echo number_format($order[$i]->getTotal()); ?>
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-xs" title="Sửa" name="order-view" 
                                       href="?order=<?php echo $order[$i]->getOrderID(); ?>">
                                        <i class="fa fa-eye" style="width: auto;"></i>
                                    </a>

                                    <?php
                                    if ($delivered === false) {
                                        ?>
                                        <button type="button" class="btn btn-danger btn-xs" title="Đã giao" name="order-delivered" 
                                                value="<?php echo $order[$i]->getOrderID(); ?>">
                                            <i class="fa fa-ship" style="width: auto;"></i>
                                        </button>
                                        <?php
                                    } else {
                                        ?>
                                        <button type="button" class="btn btn-info btn-xs" title="Chưa giao" name="order-undelivered" 
                                                value="<?php echo $order[$i]->getOrderID(); ?>">
                                            <i class="fa fa-recycle" style="width: auto;"></i>
                                        </button>
                                        <?php
                                    }
                                    ?>
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
            <i class="fa fa-square greenColor">:&nbsp;Delivered</i>
            <i class="fa fa-square redColor">:&nbsp;Undelivered</i>
        </div>
    </div>
</div>