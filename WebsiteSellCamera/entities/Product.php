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

    var $ProID, $ProName, $URL, $ShortDes, $FullDes, $Price, $Quantity, $Bought, $Viewed, $UploadDate;

    public function getProID() {
        return $this->ProID;
    }

    public function getProName() {
        return $this->ProName;
    }

    public function getURL() {
        return $this->URL;
    }

    public function getShortDes() {
        return $this->ShortDes;
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

    public function setShortDes($shortDes) {
        $this->ShortDes = $shortDes;
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

    public static function getProduct($query = "Select ProID, ProName, URL, ShortDes, FullDes, Price, Quantity, Bought, Viewed, UploadDate From products") {
        $result = array();

        $category = DataProvider::ExecuteQuery($query);

        while ($row = $category->fetch_assoc()) {
            array_push($result, new Category($row["CatID"], $row["CatName"]));
        }

        return $result;
    }

}
