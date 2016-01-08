<?php
require_once 'entities/OrderDetail.php';
require_once 'entities/Product.php';

$orderID = $_GET["order"];

$detail = OrderDetail::getOrderDetailByOrderID($orderID);
?>

<div id="product" class="list-group">
    <div class="panel-heading">Danh sách chi tiết đơn hàng</div>

    <div class="panel panel-body">
        <table id="content" class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                    <th>
                        <a href="?action=order" class="btn btn-success" title="Quay lại" name="order">
                            Quay lại
                        </a>
                    </th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (!isset($detail) || count($detail) <= 0) {
                    echo "<p style='padding: 15px;'>Không có chi tiết hóa đơn</p>";
                } else {
                    $page = isset($_GET["page"]) ? $_GET["page"] : 1;
                    $pageCount = ceil(count($detail) / 12);

                    if ($pageCount > 1) {
                        $start = $page * 12 - 12;
                        $count = $page * 12 <= count($detail) ? $page * 12 : ($page * 12) - ($page * 12 - count($detail));

                        for ($i = $start; $i < $count; $i++) {
                            ?>
                            <tr>
                                <td><?php echo $i + 1; ?></td>
                                <td><?php echo Product::getNameByProID($detail[$i]->getProID()); ?></td>
                                <td>
                                    <?php echo $detail[$i]->getQuantity(); ?>
                                </td>
                                <td>
                                    <?php echo number_format($detail[$i]->getPrice()); ?>
                                </td>
                                <td>
                                    <?php echo number_format($detail[$i]->getAmount()); ?>
                                </td>
                                <td>
                                    <a class="btn btn-info btn-xs" title="Quay lại" name="order" 
                                       href="?action=order">
                                        <i class="fa fa-reply" style="width: auto;"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        for ($i = 0; $i < count($detail); $i++) {
                            ?>
                            <tr>
                                <td><?php echo $i + 1; ?></td>
                                <td><?php echo Product::getNameByProID($detail[$i]->getProID()); ?></td>
                                <td>
                                    <?php echo $detail[$i]->getQuantity(); ?>
                                </td>
                                <td>
                                    <?php echo number_format($detail[$i]->getPrice()); ?>
                                </td>
                                <td>
                                    <?php echo number_format($detail[$i]->getAmount()); ?>
                                </td>
                                <td>
                                    <a class="btn btn-info btn-xs" title="Quay lại" name="order" 
                                       href="?action=order">
                                        <i class="fa fa-reply" style="width: auto;"></i>
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
    </div>
</div>