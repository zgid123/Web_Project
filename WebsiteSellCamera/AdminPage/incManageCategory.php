<?php
require_once 'entities/Category.php';

$_SESSION["PreviousPage"] = $_SERVER['REQUEST_URI'];

if (isset($_GET["method"])) {
    if (isset($_POST["search-catName"])) {
        $catName = isset($_POST["search-catName"]) ? $_POST["search-catName"] : "";

        $_SESSION["SearchKey"] = $catName;
    }

    $catList = Category::getCategoryBySearching($_SESSION["SearchKey"]);
} else {
    $catList = Category::getCategoryForAdmin();
}

$currentPage = basename($_SERVER['PHP_SELF']) . "?action=" . $_GET["action"];

$pageCount = 0;
?>

<div id="product" class="list-group">
    <div class="panel-heading">Danh sách loại sản phẩm</div>
    <div id="list" class="panel panel-body">
        <form class="col-md-12" id="search-bar-form" method="post" action="<?php echo $currentPage; ?>&method=search">
            <ul class="nav nav-pills">
                <li class="">
                    <label>Tìm kiếm:&ensp;</label>
                </li>

                <li class="">
                    <input id="search-proName" name="search-catName" type="text" class="form-control" placeholder="Tên loại sản phẩm" />
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
                        <a href="?action=add-category" class="btn btn-success" title="Thêm mới" name="cat-add">
                            Thêm loại sản phẩm
                        </a>
                    </th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (!isset($catList) || count($catList) <= 0) {
                    echo "<p style='padding: 15px;'>Không có loại sản phẩm</p>";
                } else {
                    $page = isset($_GET["page"]) ? $_GET["page"] : 1;
                    $pageCount = ceil(count($catList) / 12);

                    if ($pageCount > 1) {
                        $start = $page * 12 - 12;
                        $count = $page * 12 <= count($catList) ? $page * 12 : ($page * 12) - ($page * 12 - count($catList));

                        for ($i = $start; $i < $count; $i++) {
                            $removed = $catList[$i]->getIsRemoved() == 1 ? true : false;
                            ?>
                            <tr class="<?php echo $removed === true ? "bg-danger" : "bg-success"; ?>">
                                <td><?php echo $i + 1 ?></td>
                                <td><?php echo $catList[$i]->getCatName(); ?></td>
                                <td>
                                    <a class="btn btn-warning btn-xs" title="Sửa" name="cat-edit" 
                                       href="?cat=<?php echo $catList[$i]->getCatID(); ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <?php
                                    if ($removed === false) {
                                        ?>
                                        <button type="button" class="btn btn-danger btn-xs" title="Xoá" name="cat-remove" 
                                                value="<?php echo $catList[$i]->getCatID(); ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <?php
                                    } else {
                                        ?>
                                        <button type="button" class="btn btn-info btn-xs" title="Khôi phục" name="cat-restore" 
                                                value="<?php echo $catList[$i]->getCatID(); ?>">
                                            <i class="fa fa-recycle"></i>
                                        </button>
                                        <?php
                                    }
                                    ?>

                                    <a class="btn btn-success btn-xs" title="Thêm mới" name="cat-add"
                                       href="?action=add-category">
                                        <i class="fa fa-paperclip"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        for ($i = 0; $i < count($catList); $i++) {
                            $removed = $catList[$i]->getIsRemoved() == 1 ? true : false;
                            ?>
                            <tr class="<?php echo $removed === true ? "bg-danger" : "bg-success"; ?>">
                                <td><?php echo $i + 1 ?></td>
                                <td><?php echo $catList[$i]->getCatName(); ?></td>
                                <td>
                                    <a href="?cat=<?php echo $catList[$i]->getCatID(); ?>" 
                                       class="btn btn-warning btn-xs" title="Sửa" name="cat-edit" >
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <?php
                                    if ($removed === false) {
                                        ?>
                                        <button type="button" class="btn btn-danger btn-xs" title="Xoá" name="cat-remove" 
                                                value="<?php echo $catList[$i]->getCatID(); ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <?php
                                    } else {
                                        ?>
                                        <button type="button" class="btn btn-info btn-xs" title="Khôi phục" name="cat-restore" 
                                                value="<?php echo $catList[$i]->getCatID(); ?>">
                                            <i class="fa fa-recycle"></i>
                                        </button>
                                        <?php
                                    }
                                    ?>

                                    <a class="btn btn-success btn-xs" title="Thêm mới" name="cat-add"
                                       href="?action=add-category">
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