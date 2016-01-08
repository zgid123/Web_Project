<?php
session_start();
?>

﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/index-template.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
        <title>Index</title>

        <meta charset="UTF-8" />

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/myAdminCSS.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/myManageProductCSS.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/myModifyProductCSS.css" rel="stylesheet" type="text/css"/>
        <link href="Library/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css"/>

    </head>

    <body>
        <?php
        include_once 'AdminPage/incAdminHeader.php';
        require_once 'entities/Product.php';
        require_once 'entities/Category.php';
        require_once 'entities/Manufacturer.php';
        require_once 'entities/Order.php';

        unset($error);

        if (isset($_POST["Method"])) {
            if ($_POST["Method"] === "remove") {
                switch ($_POST["For"]) {
                    case "product-remove":
                        Product::removeProduct($_POST["ID"]);
                        break;
                    case "cat-remove":
                        Category::removeCategory($_POST["ID"]);
                        break;
                    case "mf-remove":
                        Manufacturer::removeManufacturer($_POST["ID"]);
                        break;
                    case "order-delivered":
                        Order::deliveredOrder($_POST["ID"]);
                        break;
                    default:
                }
            } else {
                switch ($_POST["For"]) {
                    case "product-restore":
                        Product::restoreProduct($_POST["ID"]);
                        break;
                    case "cat-restore":
                        Category::restoreCategory($_POST["ID"]);
                        break;
                    case "mf-restore":
                        Manufacturer::restoreManufacturer($_POST["ID"]);
                        break;
                    case "order-undelivered":
                        Order::undoOrder($_POST["ID"]);
                        break;
                    default:
                }
            }
        }

        if (isset($_POST["modifySubmit"])) {
            $proID = $_POST["modifySubmit"];
            $proName = $_POST["productName"];
            $catID = $_POST["cat"];
            $mfID = $_POST["mf"];
            $price = str_replace(",", "", $_POST["price"]);
            $quantity = $_POST["quantity"];
            $madein = $_POST["madein"];
            $fulldes = $_POST["des"];

            if ((($_FILES["upload"]["type"] == "image/gif") || ($_FILES["upload"]["type"] == "image/jpeg") || ($_FILES["upload"]["type"] == "image/png") || ($_FILES["upload"]["type"] == "image/jpg")) && $_FILES["upload"]["size"] <= 1000000) {
                if ($_FILES["upload"]["error"] > 0) {
                    $error = $_FILES["upload"]["error"];
                } else {
                    $fileName = $_FILES['upload']['name'];
                    $tmpName = $_FILES['upload']['tmp_name'];
                    $fileSize = $_FILES['upload']['size'];
                    $fileType = $_FILES['upload']['type'];

                    $fp = fopen($tmpName, 'r');
                    $content = fread($fp, filesize($tmpName));
                    $content = addslashes($content);
                    fclose($fp);

                    if (!get_magic_quotes_gpc()) {
                        $fileName = addslashes($fileName);
                    }

                    $URL = "assets/images/product/" . $_FILES['upload']['name'];

                    if (!file_exists($URL)) {
                        move_uploaded_file($_FILES['upload']['tmp_name'], "assets/images/product/" . $_FILES['upload']['name']);
                    } else {
                        $error = "File đã tồn tại";
                    }
                }
            } else {
                $URL = "";
            }

            if (!isset($error)) {
                Product::update($proID, $proName, $catID, $mfID, $price, $quantity, $madein, $fulldes, $URL);
            }
        } else if (isset($_POST["addSubmit"])) {
            $proName = $_POST["productName"];
            $catID = $_POST["cat"];
            $mfID = $_POST["mf"];
            $price = str_replace(",", "", $_POST["price"]);
            $quantity = $_POST["quantity"];
            $madein = $_POST["madein"];
            $fulldes = $_POST["des"];
            $date = time();

            if ((($_FILES["upload"]["type"] == "image/gif") || ($_FILES["upload"]["type"] == "image/jpeg") || ($_FILES["upload"]["type"] == "image/png") || ($_FILES["upload"]["type"] == "image/jpg")) && $_FILES["upload"]["size"] <= 1000000) {
                if ($_FILES["upload"]["error"] > 0) {
                    $error = $_FILES["upload"]["error"];
                } else {
                    $fileName = $_FILES['upload']['name'];
                    $tmpName = $_FILES['upload']['tmp_name'];
                    $fileSize = $_FILES['upload']['size'];
                    $fileType = $_FILES['upload']['type'];

                    $fp = fopen($tmpName, 'r');
                    $content = fread($fp, filesize($tmpName));
                    $content = addslashes($content);
                    fclose($fp);

                    if (!get_magic_quotes_gpc()) {
                        $fileName = addslashes($fileName);
                    }

                    $URL = "assets/images/product/" . $_FILES['upload']['name'];

                    if (!file_exists($URL)) {
                        move_uploaded_file($_FILES['upload']['tmp_name'], "assets/images/product/" . $_FILES['upload']['name']);
                    } else {
                        $error = "File đã tồn tại";
                    }
                }
            } else {
                $error = "File không hợp lệ. Chỉ được upload file gif, jpg, png và dung lượng dưới 1MB";
            }

            if (!isset($error)) {
                Product::insert($proName, $catID, $mfID, $price, $quantity, $madein, $fulldes, $URL, $date);
            } else {
                $_SESSION["TEMP"]["Name"] = $proName;
                $_SESSION["TEMP"]["Cat"] = $catID;
                $_SESSION["TEMP"]["MF"] = $mfID;
                $_SESSION["TEMP"]["Price"] = $price;
                $_SESSION["TEMP"]["Quantity"] = $quantity;
                $_SESSION["TEMP"]["Madein"] = $madein;
                $_SESSION["TEMP"]["Des"] = $fulldes;
            }
        } else if (isset($_POST["modifyCatSubmit"])) {
            $catID = $_POST["modifyCatSubmit"];
            $catName = $_POST["catName"];

            Category::update($catID, $catName);
        } else if (isset($_POST["addCatSubmit"])) {
            $catName = $_POST["catName"];

            Category::insert($catName);
        }
        ?>

        <div class="row">
            <?php
            $action = isset($_GET["action"]) ? $_GET["action"] : "";

            switch ($action) {
                case "product":
                    include_once("AdminPage/incManageProduct.php");
                    break;
                case "add-product":
                    include_once("AdminPage/incModifyProduct.php");
                    break;
                case "category":
                    include_once("AdminPage/incManageCategory.php");
                    break;
                case "add-category":
                    include_once("AdminPage/incModifyCategory.php");
                    break;
                case "manufacturer":
                    include_once("AdminPage/incManageManufacturer.php");
                    break;
                case "add-manufacturer":
                    include_once("AdminPage/incModifyManufacturer.php");
                    break;
                case "order":
                    include_once("AdminPage/incManageOrder.php");
                    break;
                default:
                    $action = isset($_GET["pro"]) ? $_GET["pro"] : "";

                    if (is_numeric($action)) {
                        include_once ("AdminPage/incModifyProduct.php");
                    } else {
                        $action = isset($_GET["cat"]) ? $_GET["cat"] : "";

                        if (is_numeric($action)) {
                            include_once ("AdminPage/incModifyCategory.php");
                        } else {
                            $action = isset($_GET["mf"]) ? $_GET["mf"] : "";

                            if (is_numeric($action)) {
                                include_once("AdminPage/incModifyManufacturer.php");
                            } else {
                                $action = isset($_GET["order"]) ? $_GET["order"] : "";

                                if (is_numeric($action)) {
                                    include_once("AdminPage/incViewDetail.php");
                                } else {
                                    $_SESSION["PreviousPage"] = $_SERVER['PHP_SELF'];
                                    include_once("admin.php");
                                }
                            }
                        }
                    }
            }
            ?>
        </div>

        <script src="assets/javascripts/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/jquery.number.min.js" type="text/javascript"></script>
        <script src="Library/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/myAdminJavascript.js" type="text/javascript"></script>
        <script src="assets/javascripts/myModifyProductJavascript.js" type="text/javascript"></script>
    </body>
    <!-- InstanceEnd -->
</html>
