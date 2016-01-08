<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product
 *
 * @author Lucifer
 */
require_once 'Utils/DataProvider.php';

class Product {

    var $ProID, $ProName, $URL, $TinyDes, $FullDes, $Price, $Quantity, $SeriesID, $Bought, $Viewed, $UploadDate, $CatID, $ManufacturerID, $MadeIn, $IsRemoved;

    public function getProID() {
        return $this->ProID;
    }

    public function getProName() {
        return $this->ProName;
    }

    public function getURL() {
        return $this->URL;
    }

    public function getTinyDes() {
        return $this->TinyDes;
    }

    public function getFullDes() {
        return $this->FullDes;
    }

    public function getPrice() {
        return $this->Price;
    }

    public function getQuantity() {
        return $this->Quantity;
    }

    public function getBought() {
        return $this->Bought;
    }

    public function getViewed() {
        return $this->Viewed;
    }

    public function getUploadDate() {
        return $this->UploadDate;
    }

    public function getCatID() {
        return $this->CatID;
    }

    public function getManufacturerID() {
        return $this->ManufacturerID;
    }

    public function getMadeIn() {
        return $this->MadeIn;
    }

    public function getIsRemoved() {
        return $this->IsRemoved;
    }

    public function getSeriesID() {
        return $this->SeriesID;
    }

    public function setProID($id) {
        $this->ProID = $id;
    }

    public function setProName($name) {
        $this->ProName = $name;
    }

    public function setURL($url) {
        $this->URL = $url;
    }

    public function setTinyDes($shortDes) {
        $this->TinyDes = $shortDes;
    }

    public function setFullDes($fullDes) {
        $this->FullDes = $fullDes;
    }

    public function setPrice($price) {
        $this->Price = $price;
    }

    public function setQuantity($quantity) {
        $this->Quantity = $quantity;
    }

    public function setBought($bought) {
        $this->Bought = $bought;
    }

    public function setViewed($view) {
        $this->Viewed = $view;
    }

    public function setUploadDate($date) {
        $this->UploadDate = $date;
    }

    public function setCatID($catID) {
        $this->CatID = $catID;
    }

    public function setManufacturerID($mfID) {
        $this->ManufacturerID = $mfID;
    }

    public function setMadeIn($madeIn) {
        $this->MadeIn = $madeIn;
    }

    public function setIsRemoved($status) {
        $this->IsRemoved = $status;
    }

    public function setSeriesID($series) {
        $this->SeriesID = $series;
    }

    public function __construct($id, $name, $url, $tinyDes, $fullDes, $price, $quantity, $bought, $viewd, $uploadDate, $catID, $manufacturerID, $madeIn, $status) {
        $this->ProID = $id;
        $this->ProName = $name;
        $this->URL = $url;
        $this->TinyDes = $tinyDes;
        $this->FullDes = $fullDes;
        $this->Price = $price;
        $this->Quantity = $quantity;
        $this->Bought = $bought;
        $this->Viewed = $viewd;
        $this->UploadDate = $uploadDate;
        $this->CatID = $catID;
        $this->ManufacturerID = $manufacturerID;
        $this->MadeIn = $madeIn;
        $this->IsRemoved = $status;
    }

    public static function getProducts($query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn From products Where IsRemoved = 0") {
        $result = array();

        $products = DataProvider::ExecuteQuery($query);

        while ($row = $products->fetch_assoc()) {
            array_push($result, new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"], $row["CatID"], $row["ManufacturerID"], $row["MadeIn"], 0));
        }

        return $result;
    }

    public static function getProductByID($proID) {
        $query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn "
                . "From products Where ProID = $proID And IsRemoved = 0";
        $product = null;

        $result = DataProvider::ExecuteQuery($query);

        if ($result) {
            if ($row = $result->fetch_assoc()) {
                $product = new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"], $row["CatID"], $row["ManufacturerID"], $row["MadeIn"], 0);
            }
        }

        return $product;
    }

    public static function getProductsByCatID($catID) {
        $result = array();
        $query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn "
                . "From products Where CatID = $catID And IsRemoved = 0";

        $products = DataProvider::ExecuteQuery($query);

        while ($row = $products->fetch_assoc()) {
            array_push($result, new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"], $row["CatID"], $row["ManufacturerID"], $row["MadeIn"], 0));
        }

        return $result;
    }

    public static function getProductsByMFID($mfID) {
        $result = array();
        $query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn "
                . "From products Where ManufacturerID = $mfID And IsRemoved = 0";

        $products = DataProvider::ExecuteQuery($query);

        while ($row = $products->fetch_assoc()) {
            array_push($result, new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"], $row["CatID"], $row["ManufacturerID"], $row["MadeIn"], 0));
        }

        return $result;
    }

    public static function getProductsBySeriesID($seriesID) {
        $result = array();
        $query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn "
                . "From products Where SeriesID = $seriesID And IsRemoved = 0";

        $products = DataProvider::ExecuteQuery($query);

        while ($row = $products->fetch_assoc()) {
            array_push($result, new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"], $row["CatID"], $row["ManufacturerID"], $row["MadeIn"], 0));
        }

        return $result;
    }

    public static function updateProductViewed($proID) {
        $query = "Update products Set Viewed = Viewed + 1 Where ProID = $proID";

        DataProvider::ExecuteQuery($query);
    }

    public static function updateProductBought($proID, $quantity) {
        $query = "Update products Set Bought = Bought + $quantity, Quantity = Quantity - $quantity Where ProID = $proID";

        DataProvider::ExecuteQuery($query);
    }

    public static function get5ProductsByMFID($mfID, $proID) {
        $result = array();
        $query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn "
                . "From products Where ManufacturerID = $mfID And ProID <> $proID And IsRemoved = 0 "
                . "Order by rand() "
                . "Limit 5";

        $products = DataProvider::ExecuteQuery($query);

        while ($row = $products->fetch_assoc()) {
            array_push($result, new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"], $row["CatID"], $row["ManufacturerID"], $row["MadeIn"], 0));
        }

        return $result;
    }

    public static function get5ProductsByCatID($catID, $proID) {
        $result = array();
        $query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn "
                . "From products Where CatID = $catID And ProID <> $proID And IsRemoved = 0 "
                . "Order by rand() "
                . "Limit 5";

        $products = DataProvider::ExecuteQuery($query);

        while ($row = $products->fetch_assoc()) {
            array_push($result, new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"], $row["CatID"], $row["ManufacturerID"], $row["MadeIn"], 0));
        }

        return $result;
    }

    public static function getQuantityByProID($proID) {
        $query = "Select Quantity "
                . "From products Where ProID = $proID";

        $result = DataProvider::ExecuteQuery($query);

        if ($result) {
            if ($row = $result->fetch_assoc()) {
                $result = $row["Quantity"];
            }
        }

        return $result;
    }

    public static function getPriceByProID($proID) {
        $query = "Select Price "
                . "From products Where ProID = $proID";

        $result = DataProvider::ExecuteQuery($query);

        if ($result) {
            if ($row = $result->fetch_assoc()) {
                $result = $row["Price"];
            }
        }

        return $result;
    }

    public static function getNameByProID($proID) {
        $query = "Select ProName "
                . "From products Where ProID = $proID";

        $result = DataProvider::ExecuteQuery($query);

        if ($result) {
            if ($row = $result->fetch_assoc()) {
                $result = $row["ProName"];
            }
        }

        return $result;
    }

    public static function getProductsBySearching($proName, $catID, $mfID, $minPrice, $maxPrice) {
        $query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn "
                . "From products "
                . "Where ProName Like '%$proName%' And CatID Like Case $catID When 0 Then '%' Else $catID End "
                . "And ManufacturerID Like Case $mfID When 0 Then '%' Else $mfID End "
                . "And Price >= ifnull($minPrice, 0) And IsRemoved = 0 ";

        if ($maxPrice != null) {
            $query .= "And Price <= $maxPrice ";
        }

        $query .= "Order by Price ASC";

        $result = array();

        $products = DataProvider::ExecuteQuery($query);

        while ($row = $products->fetch_assoc()) {
            array_push($result, new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"], $row["CatID"], $row["ManufacturerID"], $row["MadeIn"], 0));
        }

        return $result;
    }

    public static function getProductsForAdmin($query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn, IsRemoved From products") {
        $result = array();

        $products = DataProvider::ExecuteQuery($query);

        while ($row = $products->fetch_assoc()) {
            array_push($result, new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"], $row["CatID"], $row["ManufacturerID"], $row["MadeIn"], $row["IsRemoved"]));
        }

        return $result;
    }

    public static function getProductsBySearchingForAdmin($proName, $catID, $mfID, $minPrice, $maxPrice) {
        $query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn, IsRemoved "
                . "From products "
                . "Where ProName Like '%$proName%' And CatID Like Case $catID When 0 Then '%' Else $catID End "
                . "And ManufacturerID Like Case $mfID When 0 Then '%' Else $mfID End "
                . "And Price >= ifnull($minPrice, 0) ";

        if ($maxPrice != null) {
            $query .= "And Price <= $maxPrice ";
        }

        $query .= "Order by Price ASC";

        $result = array();

        $products = DataProvider::ExecuteQuery($query);

        while ($row = $products->fetch_assoc()) {
            array_push($result, new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"], $row["CatID"], $row["ManufacturerID"], $row["MadeIn"], $row["IsRemoved"]));
        }

        return $result;
    }

    public static function removeProduct($proID) {
        $query = "Update products Set IsRemoved = 1 Where ProID = $proID";

        DataProvider::ExecuteQuery($query);
    }

    public static function restoreProduct($proID) {
        $query = "Update products Set IsRemoved = 0 Where ProID = $proID";

        DataProvider::ExecuteQuery($query);
    }

    public static function update($proID, $proName, $catID, $mfID, $price, $quantity, $madein, $fulldes, $url) {
        $query = "Update products "
                . "Set ProName = '$proName', CatID = '$catID', ManufacturerID = '$mfID', Price = '$price', Quantity = '$quantity', MadeIn = '$madein', FullDes = '$fulldes', URL = '$url' "
                . "Where ProID = $proID";

        DataProvider::ExecuteQuery($query);
    }

    public static function insert($proName, $catID, $mfID, $price, $quantity, $madein, $fulldes, $url, $date) {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $d = date('Y-m-d H:i:s', $date);

        $query = "insert into products (ProName, CatID, ManufacturerID, Price, Quantity, MadeIn, FullDes, URL, UploadDate) "
                . "values ('$proName', '$catID', '$mfID', '$price', '$quantity', '$madein', '$fulldes', '$url', '$d')";

        DataProvider::ExecuteQuery($query);
    }

}
