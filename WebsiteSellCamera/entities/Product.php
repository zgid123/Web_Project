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

    var $ProID, $ProName, $URL, $TinyDes, $FullDes, $Price, $Quantity, $Bought, $Viewed, $UploadDate;

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

    public function __construct($id, $name, $url, $tinyDes, $fullDes, $price, $quantity, $bought, $viewd, $uploadDate) {
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
    }

    public static function getProducts($query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate From products") {
        $result = array();

        $products = DataProvider::ExecuteQuery($query);

        while ($row = $products->fetch_assoc()) {
            array_push($result, new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"]));
        }

        return $result;
    }

    public static function getProductByID($proID) {
        $query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate "
                . "From products Where ProID = $proID";

        $product = DataProvider::ExecuteQuery($sql);

        if (isset($product))
            return $product;
        else
            return null;
    }

    public static function getProductsByCatID($catID) {
        $result = array();
        $query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate "
                . "From products Where CatID = $catID";

        $products = DataProvider::ExecuteQuery($query);

        while ($row = $products->fetch_assoc()) {
            array_push($result, new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"]));
        }

        return $result;
    }

    public static function getProductsByMFID($mfID) {
        $result = array();
        $query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate "
                . "From products Where ManufacturerID = $mfID";

        $products = DataProvider::ExecuteQuery($query);

        while ($row = $products->fetch_assoc()) {
            array_push($result, new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"]));
        }

        return $result;
    }

    public static function getProductsBySeriesID($seriesID) {
        $result = array();
        $query = "Select ProID, ProName, URL, TinyDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate "
                . "From products Where SeriesID = $seriesID";

        $products = DataProvider::ExecuteQuery($query);

        while ($row = $products->fetch_assoc()) {
            array_push($result, new Product($row["ProID"], $row["ProName"], $row["URL"], $row["TinyDes"], $row["FullDes"], $row["Price"], $row["Quantity"], $row["Bought"], $row["Viewed"], $row["UploadDate"]));
        }

        return $result;
    }

}
