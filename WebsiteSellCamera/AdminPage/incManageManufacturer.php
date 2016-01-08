<?php
require_once 'entities/Manufacturer.php';

$_SESSION["PreviousPage"] = $_SERVER['REQUEST_URI'];

if (isset($_GET["method"])) {
    if (isset($_POST["search-mfName"])) {
        $mfName = isset($_POST["search-mfName"]) ? $_POST["search-mfName"] : "";

        $_SESSION["SearchKey"] = $mfName;
    }

    $mfList = Manufacturer::getManufacturerBySearching($_SESSION["SearchKey"]);
} else {
    $mfList = Manufacturer::getManufacturerForAdmin();
}

$currentPage = basename($_SERVER['PHP_SELF']) . "?action=" . $_GET["action"];

$pageCount = 0;
?>

<div id="product" class="list-group">
    <div class="panel-heading">Danh sách nhà sản xuất</div>
    <div id="list" class="panel panel-body">
        <form class="col-md-12" id="search-bar-form" method="post" action="<?php echo $currentPage; ?>&method=search">
            <ul class="nav nav-pills">
                <li class="">
                    <label>Tìm kiếm:&ensp;</label>
                </li>

                <li class="">
                    <input id="search-mfName" name="search-mfName" type="text" class="form-control" placeholder="Tên nhà sản xuất" />
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
                    <th>Tên</th>
                    <th>
                        <a href="?action=add-manufacturer" class="btn btn-success" title="Thêm mới" name="mf-add">
                            Thêm nhà sản xuất
                        </a>
                    </th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (!isset($mfList) || count($mfList) <= 0) {
                    echo "<p style='padding: 15px;'>Không có nhà sản xuất</p>";
                } else {
                    $page = isset($_GET["page"]) ? $_GET["page"] : 1;
                    $pageCount = ceil(count($mfList) / 12);

                    if ($pageCount > 1) {
                        $start = $page * 12 - 12;
                        $count = $page * 12 <= count($catList) ? $page * 12 : ($page * 12) - ($page * 12 - count($mfList));

                        for ($i = $start; $i < $count; $i++) {
                            $removed = $mfList[$i]->getIsRemoved() == 1 ? true : false;
                            ?>
                            <tr class="<?php echo $removed === true ? "bg-danger" : "bg-success"; ?>">
                                <td><?php echo $i + 1 ?></td>
                                <td><?php echo $mfList[$i]->getMFName(); ?></td>
                                <td>
                                    <a class="btn btn-warning btn-xs" title="Sửa" name="mf-edit" 
                                       href="?mf=<?php echo $mfList[$i]->getMFID(); ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <?php
                                    if ($removed === false) {
                                        ?>
                                        <button type="button" class="btn btn-danger btn-xs" title="Xoá" name="mf-remove" 
                                                value="<?php echo $mfList[$i]->getMFID(); ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <?php
                                    } else {
                                        ?>
                                        <button type="button" class="btn btn-info btn-xs" title="Khôi phục" name="mf-restore" 
                                                value="<?php echo $mfList[$i]->getMFID(); ?>">
                                            <i class="fa fa-recycle"></i>
                                        </button>
                                        <?php
                                    }
                                    ?>

                                    <a class="btn btn-success btn-xs" title="Thêm mới" name="mf-add"
                                       href="?action=add-manufacturer">
                                        <i class="fa fa-paperclip"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        for ($i = 0; $i < count($mfList); $i++) {
                            $removed = $mfList[$i]->getIsRemoved() == 1 ? true : false;
                            ?>
                            <tr class="<?php echo $removed === true ? "bg-danger" : "bg-success"; ?>">
                                <td><?php echo $i + 1 ?></td>
                                <td><?php echo $mfList[$i]->getMFName(); ?></td>
                                <td>
                                    <a href="?mf=<?php echo $mfList[$i]->getMFID(); ?>" 
                                       class="btn btn-warning btn-xs" title="Sửa" name="mf-edit" >
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <?php
                                    if ($removed === false) {
                                        ?>
                                        <button type="button" class="btn btn-danger btn-xs" title="Xoá" name="mf-remove" 
                                                value="<?php echo $mfList[$i]->getMFID(); ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <?php
                                    } else {
                                        ?>
                                        <button type="button" class="btn btn-info btn-xs" title="Khôi phục" name="mf-restore" 
                                                value="<?php echo $mfList[$i]->getMFID(); ?>">
                                            <i class="fa fa-recycle"></i>
                                        </button>
                                        <?php
                                    }
                                    ?>

                                    <a class="btn btn-success btn-xs" title="Thêm mới" name="mf-add"
                                       href="?action=add-manufacturer">
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