<?php
session_start();

if (!isset($_SESSION["Username"])) {
    $_SESSION["Username"] = null;
}

if (!isset($_SESSION["Cart"])) {
    $_SESSION["Cart"] = array();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/index-template.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
        <title>Index</title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/myHeaderCSS.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/myTopCSS.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/myFooterCSS.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/myLeftCSS.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/myContentCSS.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/myRegisterCSS.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/myProductCSS.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/myDetailCSS.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/mycss.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/myCartCSS.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <?php
        require_once 'Utils/Provider.php';
        require_once 'entities/User.php';
        require_once 'entities/Cart.php';
        require_once 'entities/Product.php';
        require_once 'entities/Order.php';
        require_once 'entities/OrderDetail.php';

        $paySuccess = false;

        if (isset($_POST["btnPay"])) {
            $total = $_POST["btnPay"];
            $order = new Order(-1, time(), $_SESSION["UserID"], str_replace(",", "", $total), 0);

            $order->insert();

            foreach ($_SESSION["Cart"] as $proID => $Quantity) {
                $price = Product::getPriceByProID($proID);
                $amount = $price * $Quantity;

                $detail = new OrderDetail(-1, $order->getOrderID(), $proID, $Quantity, $price, $amount);

                $detail->insert();

                Product::updateProductBought($proID, $Quantity);
            }

            Cart::destroyCart();

            $paySuccess = true;
        }

        if (isset($_POST["Method"])) {
            if ($_POST["Method"] === "Update") {
                Cart::updateItem($_POST["IDProduct"], $_POST["QuantityProduct"]);
            } elseif ($_POST["Method"] === "Add") {
                Cart::addItem($_POST["IDProduct"], $_POST["QuantityProduct"]);
            } else {
                Cart::removeItem($_POST["IDProduct"]);
            }
        }

        Cart::updateCart();

        if (Provider::IsLogged() === false) {
            if (isset($_POST["btnLogin"])) {
                $username = $_POST["username"];
                $pwd = $_POST["password"];

                $u = new User(0, $username, $pwd, "", "", "", "", "", "");

                $result = $u->login();

                if ($result) {
                    $_SESSION["Username"] = $u->getUsername();
                    $_SESSION["UserID"] = $u->getID();
                    $_SESSION["Permission"] = $u->getPermission();

                    $expire = time() + 15 * 24 * 60 * 60;
                    setcookie("Username", $username, $expire);

                    $hasNotice = true;

                    if (isset($_GET["action"]) == true && $_GET["action"] == "register") {
                        Provider::Redirect("index.php");
                    }
                } else {
                    $hasNotice = false;
                }
            }
        } else {
            if (isset($_POST["btnLogout"])) {
                Provider::destroy();
                if (isset($_GET["action"]) == true &&
                        ($_GET["action"] === "profile" || $_GET["action"] === "security")) {
                    Provider::Redirect("index.php");
                }
            }
        }
        if (isset($_POST["reload"])) {
            if (isset($_SESSION["registerSuccess"]) == true && $_SESSION["registerSuccess"] === true) {
                unset($_SESSION["registerSuccess"]);
                Provider::Redirect("index.php");
            }
        }
        ?>

        <div class="header" id="header">
            <?php
            include_once("include/incHeader.php");
            ?>
        </div>

        <img src="assets/images/banner.jpg" alt=""/>

        <a href="#"><span><i class="fa fa-arrow-circle-up" id="back-to-top"></i></span></a>

        <div class="container-fluid" id="body">
            <div class="row">
                <div class="col-md-12" id="top">
                    <?php
                    include_once("include/incTop.php");
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3" id="left">
                    <?php
                    include_once("include/incLeft.php");
                    ?>
                </div>

                <div class="col-md-9">
                    <?php
                    if (isset($hasNotice) === false || $hasNotice == true) {
                        $action = isset($_GET["action"]) ? $_GET["action"] : "";

                        switch ($action) {
                            case "register":
                                include_once("include/incRegister.php");
                                break;
                            case "product":
                                include_once("include/incProduct.php");
                                break;
                            case "cart":
                                include_once("include/incCart.php");
                                break;
                            case "profile":
                                include_once("include/incProfile.php");
                                break;
                            case "security":
                                include_once("include/incSecurity.php");
                                break;
                            case "search":
                                include_once("include/incProduct.php");
                                break;
                            default:
                                $action = isset($_GET["catID"]) ? $_GET["catID"] : "";

                                if (is_numeric($action)) {
                                    include_once ("include/incProduct.php");
                                } else {
                                    $action = isset($_GET["mf"]) ? $_GET["mf"] : "";

                                    if (is_numeric($action)) {
                                        include_once ("include/incProduct.php");
                                    } else {
                                        $action = isset($_GET["series"]) ? $_GET["series"] : "";

                                        if (is_numeric($action)) {
                                            include_once ("include/incProduct.php");
                                        } else {
                                            $action = isset($_GET["page"]) ? $_GET["page"] : "";

                                            if (is_numeric($action)) {
                                                include_once("include/incProduct.php");
                                            } else {
                                                $action = isset($_GET["pro"]) ? $_GET["pro"] : "";

                                                if (is_numeric($action)) {
                                                    include_once ("include/incDetail.php");
                                                } else {

                                                    $_SESSION["PreviousPage"] = $_SERVER['PHP_SELF'];
                                                    include_once("include/incHome.php");
                                                }
                                            }
                                        }
                                    }
                                }
                        }
                    } elseif ($hasNotice == false) {
                        ?>
                        <div id="" class="list-group">
                            <div class="panel panel-body">
                                Đăng nhập thất bại
                                <br/>
                                <br/>
                                Tự động quay về trang chủ sau <span>3</span> giây
                            </div>
                            <form><input type="hidden" id="reload" name="reload" value="" /></form>
                        </div>
                        <?php
                        unset($hasNotice);
                    }
                    ?>
                </div>
            </div> 
        </div>

        <div class="footer" id="footer">
            <?php
            include_once("include/incFooter.php");
            ?>
        </div>

        <script src="assets/javascripts/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/jquery.number.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/myJavascript.js" type="text/javascript"></script>
        <script src="assets/javascripts/myRegisterJavascript.js" type="text/javascript"></script>
        <script src="assets/javascripts/myMenuJavascript.js" type="text/javascript"></script>
        <script src="assets/javascripts/myProductJavascript.js" type="text/javascript"></script>
        <script src="assets/javascripts/myCartJavascript.js" type="text/javascript"></script>
        <script src="assets/javascripts/mySearchJavascript.js" type="text/javascript"></script>
    </body>
    <!-- InstanceEnd -->
</html>