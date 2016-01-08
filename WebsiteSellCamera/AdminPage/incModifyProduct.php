<?php
require_once 'entities/Product.php';
require_once 'entities/Category.php';
require_once 'entities/Manufacturer.php';

$catList = Category::getCategory();
$mfList = Manufacturer::getManufacturer();

if (isset($_GET["pro"])) {
    $proID = $_GET["pro"];

    $product = Product::getProductByID($proID);

    $Name = $product->getProName();
    $Cat = $product->getCatID();
    $MF = $product->getManufacturerID();
    $Price = $product->getPrice();
    $Quantity = $product->getQuantity();
    $Madein = $product->getMadeIn();
    $Des = $product->getFullDes();
    $URL = $product->getURL();
} else {
    if (!isset($error)) {
        $proID = 0;
        $Name = "";
        $Cat = "";
        $MF = "";
        $Price = "";
        $Quantity = "";
        $Madein = "";
        $Des = "";
        $URL = "";
    } else {
        $proID = 0;
        $Name = $_SESSION["TEMP"]["Name"];
        $Cat = $_SESSION["TEMP"]["Cat"];
        $MF = $_SESSION["TEMP"]["MF"];
        $Price = $_SESSION["TEMP"]["Price"];
        $Quantity = $_SESSION["TEMP"]["Quantity"];
        $Madein = $_SESSION["TEMP"]["Madein"];
        $Des = $_SESSION["TEMP"]["Des"];
        $URL = "";
    }
}
?>

<div id="product-modify" class="list-group">
    <?php
    if (isset($error)) {
        ?>
        <div id="" class="panel panel-body">
            <?php echo $error; ?>
        </div>
        <?php
    }
    ?>
    <div class="panel-heading">
        <?php echo isset($_GET["pro"]) === true ? "Cập nhật thông tin " : "Thêm mới "; ?>sản phẩm
    </div>
    <div id="" class="panel panel-body">
        <form method="post" enctype="multipart/form-data">
            <div class="col-md-2">
                <div class="infor"><label>Tên sản phẩm:</label></div>
                <div class="infor"><label>Loại sản phẩm:</label></div>
                <div class="infor"><label>Nhà sản xuất:</label></div>
                <div class="infor"><label>Series:</label></div>
                <div class="infor"><label>Giá:</label></div>
                <div class="infor"><label>Số lượng tồn:</label></div>
                <div class="infor"><label>Nơi sản xuất:</label></div>
                <div class="infor"><label>Mô tả:</label></div>
            </div>

            <div class="col-md-5">
                <div class="form-group">
                    <input class="form-control" placeholder="Tên sản phẩm" value="<?php echo $Name; ?>"
                           id="productName" name="productName"/>
                </div>

                <div class="form-group">
                    <select id="cat" name="cat">
                        <?php
                        for ($i = 0; $i < count($catList); $i++) {
                            ?>
                            <option value="<?php echo $catList[$i]->getCatID(); ?>" 
                                    <?php echo $catList[$i]->getCatID() == $Cat ? "selected" : ""; ?>>
                                        <?php echo $catList[$i]->getCatName(); ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <select id="mf" name="mf">
                        <?php
                        for ($i = 0; $i < count($mfList); $i++) {
                            ?>
                            <option value="<?php echo $mfList[$i]->getMFID(); ?>" 
                                    <?php echo $mfList[$i]->getMFID() == $MF ? "selected" : ""; ?>>
                                        <?php echo $mfList[$i]->getMFName(); ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <input class="form-control" placeholder="Series" />
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Giá" id="price" name="price" 
                           value="<?php echo $Price; ?>" />
                </div>


                <div class="form-group">
                    <input class="form-control" placeholder="Số lượng tồn" id="quantity" name="quantity"
                           value="<?php echo $Quantity; ?>"/>
                </div>

                <div class="form-group">
                    <input class="form-control" placeholder="Nơi sản xuất" id="madein" name="madein"
                           value="<?php echo $Madein; ?>"/>
                </div>

                <div class="form-group">
                    <textarea class="col-md-12" rows="4" style="resize: none;" id="des" name="des">
                        <?php echo $Des; ?>
                    </textarea>
                </div>
            </div>

            <div class="col-md-5">
                <div class="form-group productImg">
                    <img src="<?php echo $URL; ?>" title="Ảnh" align="middle" alt="Ảnh" id="img" />
                </div>

                <div class="form-group" style="text-align: center;">
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                    <input type="file" id="upload" name="upload" />
                </div>

                <div class="col-md-12" style="text-align: center; padding: 15px;">
                    <div class="col-md-6">
                        <a href="?action=product" class="btn btn-danger"><i class="fa fa-times"></i>&ensp;Hủy</a>
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success" value="<?php echo $proID; ?>" 
                                <?php echo $proID != 0 ? "id='modifySubmit' name='modifySubmit'" : "id='addSubmit' name='addSubmit'"; ?>>
                            <i class="fa fa-check"></i>&ensp;Xong
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>