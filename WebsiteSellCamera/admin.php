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

    </head>

    <body>
        <?php
        include_once 'AdminPage/incAdminHeader.php';
        require_once 'entities/Product.php';

        if (isset($_POST["Method"])) {
            if ($_POST["Method"] === "remove") {
                switch ($_POST["For"]) {
                    case "product-remove":
                        Product::removeProduct($_POST["ID"]);
                        break;
                    default:
                }
            } else {
                switch ($_POST["For"]) {
                    case "product-restore":
                        Product::restoreProduct($_POST["ID"]);
                        break;
                    default:
                }
            }
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
                default:
                    $action = isset($_GET["pro"]) ? $_GET["pro"] : "";

                    if (is_numeric($action)) {
                        include_once ("AdminPage/incModifyProduct.php");
                    } else {
                        $action = isset($_GET["catID"]) ? $_GET["catID"] : "";

                        if (is_numeric($action)) {
                            include_once ("include/incProduct.php");
                        } else {

                            $_SESSION["PreviousPage"] = $_SERVER['PHP_SELF'];
                            include_once("admin.php");
                        }
                    }
            }
            ?>
        </div>

        <script src="assets/javascripts/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/jquery.number.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/myAdminJavascript.js" type="text/javascript"></script>
    </body>
    <!-- InstanceEnd -->
</html>
