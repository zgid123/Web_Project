<?php
require_once 'entities/Category.php';

if (isset($_GET["cat"])) {
    $catID = $_GET["cat"];

    $cat = Category::getCategoryByID($catID);

    $Name = $cat->getCatName();
} else {
    $catID = 0;
    $Name = "";
}
?>

<div id="cat-modify" class="list-group">
    <div class="panel-heading">
        <?php echo isset($_GET["cat"]) === true ? "Cập nhật thông tin " : "Thêm mới "; ?>loại sản phẩm
    </div>
    <div id="" class="panel panel-body">
        <form method="post">
            <div class="col-md-2">
                <div class="infor"><label>Tên loại sản phẩm:</label></div>
            </div>

            <div class="col-md-5">
                <div class="form-group">
                    <input class="form-control" placeholder="Tên loại sản phẩm" value="<?php echo $Name; ?>"
                           id="catName" name="catName"/>
                </div>

                <div class="col-md-12" style="text-align: center; padding: 15px;">
                    <div class="col-md-6">
                        <a href="?action=category" class="btn btn-danger"><i class="fa fa-times"></i>&ensp;Hủy</a>
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success" value="<?php echo $catID; ?>" 
                                <?php echo $catID != 0 ? "id='modifyCatSubmit' name='modifyCatSubmit'" : "id='addCatSubmit' name='addCatSubmit'"; ?>>
                            <i class="fa fa-check"></i>&ensp;Xong
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>