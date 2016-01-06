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

    var $ProID, $ProName, $URL, $TinyDes, $FullDes, $Price, $Quantity, $Bought, $Viewed, $UploadDate, $CatID, $ManufacturerID, $MadeIn;

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

    public function __construct($id, $name, $url, $tinyDes, $fullDes, $price, $quantity, $bought, $viewd, $uploadDate, $catID, $manufacturerID, $madeIn) {
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
    }

    public static function getProducts($query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn From products") {
        $result = array();

        $products = DataProvider::ExecuteQuery($query);

        while ($row = $products->fetch_assoc()) {
            array_push($result, new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"], $row["CatID"], $row["ManufacturerID"], $row["MadeIn"]));
        }

        return $result;
    }

    public static function getProductByID($proID) {
        $query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn "
                . "From products Where ProID = $proID";
        $product = null;

        $result = DataProvider::ExecuteQuery($query);

        if ($result) {
            if ($row = $result->fetch_assoc()) {
                $product = new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"], $row["CatID"], $row["ManufacturerID"], $row["MadeIn"]);
            }
        }

        return $product;
    }

    public static function getProductsByCatID($catID) {
        $result = array();
        $query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn "
                . "From products Where CatID = $catID";

        $products = DataProvider::ExecuteQuery($query);

        while ($row = $products->fetch_assoc()) {
            array_push($result, new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"], $row["CatID"], $row["ManufacturerID"], $row["MadeIn"]));
        }

        return $result;
    }

    public static function getProductsByMFID($mfID) {
        $result = array();
        $query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn "
                . "From products Where ManufacturerID = $mfID";

        $products = DataProvider::ExecuteQuery($query);

        while ($row = $products->fetch_assoc()) {
            array_push($result, new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"], $row["CatID"], $row["ManufacturerID"], $row["MadeIn"]));
        }

        return $result;
    }

    public static function getProductsBySeriesID($seriesID) {
        $result = array();
        $query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn "
                . "From products Where SeriesID = $seriesID";

        $products = DataProvider::ExecuteQuery($query);

        while ($row = $products->fetch_assoc()) {
            array_push($result, new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"], $row["CatID"], $row["ManufacturerID"], $row["MadeIn"]));
        }

        return $result;
    }

    public static function updateProductViewed($proID) {
        $query = "Update products Set Viewed = Viewed + 1 Where ProID = $proID";

        DataProvider::ExecuteQuery($query);
    }

    public static function updateProductBought($proID) {
        $query = "Update products Set Bought = Bought + 1 Where ProID = $proID";

        DataProvider::ExecuteQuery($query);
    }

    public static function get5ProductsByMFID($mfID, $proID) {
        $result = array();
        $query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn "
                . "From products Where ManufacturerID = $mfID And ProID <> $proID "
                . "Order by rand() "
                . "Limit 5";

        $products = DataProvider::ExecuteQuery($query);

        while ($row = $products->fetch_assoc()) {
            array_push($result, new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"], $row["CatID"], $row["ManufacturerID"], $row["MadeIn"]));
        }

        return $result;
    }

    public static function get5ProductsByCatID($catID, $proID) {
        $result = array();
        $query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn "
                . "From products Where CatID = $catID And ProID <> $proID "
                . "Order by rand() "
                . "Limit 5";

        $products = DataProvider::ExecuteQuery($query);

        while ($row = $products->fetch_assoc()) {
            array_push($result, new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"], $row["CatID"], $row["ManufacturerID"], $row["MadeIn"]));
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

    public static function getProductsBySearching($proName, $catID, $mfID, $minPrice, $maxPrice) {
        $query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate, CatID, ManufacturerID, MadeIn "
                . "From products "
                . "Where ProName Like '%$proName%' And CatID Like Case $catID When 0 Then '%' Else $catID End "
                . "And ManufacturerID Like Case $mfID When 0 Then '%' Else $mfID End "
                . "And Price >= ifnull($minPrice, 0) ";

        if ($maxPrice != null) {
            $query . "And Price <= $maxPrice";
        }

        $result = array();

        $products = DataProvider::ExecuteQuery($query);

        while ($row = $products->fetch_assoc()) {
            array_push($result, new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"], $row["CatID"], $row["ManufacturerID"], $row["MadeIn"]));
        }

        return $result;
    }

}
