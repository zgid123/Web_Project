<?php
require_once 'entities/Manufacturer.php';

if (isset($_GET["mf"])) {
    $mfID = $_GET["mf"];

    $mf = Manufacturer::getManufacturerByID($mfID);

    $Name = $mf->getMFName();
} else {
    $mfID = 0;
    $Name = "";
}
?>

<div id="mf-modify" class="list-group">
    <div class="panel-heading">
        <?php echo isset($_GET["cat"]) === true ? "Cập nhật thông tin " : "Thêm mới "; ?>nhà sản xuất
    </div>
    <div id="" class="panel panel-body">
        <form method="post">
            <div class="col-md-2">
                <div class="infor"><label>Tên nhà sản xuất:</label></div>
            </div>

            <div class="col-md-5">
                <div class="form-group">
                    <input class="form-control" placeholder="Tên nhà sản xuất" value="<?php echo $Name; ?>"
                           id="mfName" name="mfName"/>
                </div>

                <div class="col-md-12" style="text-align: center; padding: 15px;">
                    <div class="col-md-6">
                        <a href="?action=manufacturer" class="btn btn-danger"><i class="fa fa-times"></i>&ensp;Hủy</a>
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success" value="<?php echo $mfID; ?>" 
                                <?php echo $mfID != 0 ? "id='modifyMFSubmit' name='modifyMFSubmit'" : "id='addMFSubmit' name='addMFSubmit'"; ?>>
                            <i class="fa fa-check"></i>&ensp;Xong
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>