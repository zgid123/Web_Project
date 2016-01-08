<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category
 *
 * @author Lucifer
 */
require_once 'Utils/DataProvider.php';

class Category {

    var $CatID, $CatName, $IsRemoved;

    public function getCatID() {
        return $this->CatID;
    }

    public function getCatName() {
        return $this->CatName;
    }

    public function getIsRemoved() {
        return $this->IsRemoved;
    }

    public function setIsRemoved($status) {
        $this->IsRemoved = $status;
    }

    public function setCatID($id) {
        $this->CatID = $id;
    }

    public function setCatName($name) {
        $this->CatName = $name;
    }

    public function __construct($id, $name, $status) {
        $this->CatID = $id;
        $this->CatName = $name;
        $this->IsRemoved = $status;
    }

    public static function getCategory($query = "Select CatID, CatName From category Where IsRemoved = 0") {
        $result = array();

        $category = DataProvider::ExecuteQuery($query);

        while ($row = $category->fetch_assoc()) {
            array_push($result, new Category($row["CatID"], $row["CatName"], 0));
        }

        return $result;
    }

    public static function getCategoryByID($catID) {
        $query = "Select CatID, CatName From category Where CatID = $catID";

        $category = null;

        $result = DataProvider::ExecuteQuery($query);

        if ($row = $result->fetch_assoc()) {
            $category = new Category($row["CatID"], $row["CatName"], 0);
        }

        return $category;
    }

    public static function getCategoryForAdmin($query = "Select CatID, CatName, IsRemoved From category") {
        $result = array();

        $category = DataProvider::ExecuteQuery($query);

        while ($row = $category->fetch_assoc()) {
            array_push($result, new Category($row["CatID"], $row["CatName"], $row["IsRemoved"]));
        }

        return $result;
    }

    public static function getCategoryBySearching($catName) {
        $result = array();

        $query = "Select CatID, CatName, IsRemoved From category Where CatName Like '%$catName%'";

        $category = DataProvider::ExecuteQuery($query);

        while ($row = $category->fetch_assoc()) {
            array_push($result, new Category($row["CatID"], $row["CatName"], $row["IsRemoved"]));
        }

        return $result;
    }

    public static function removeCategory($catID) {
        $query = "Update category Set IsRemoved = 1 Where CatID = '$catID'";

        DataProvider::ExecuteQuery($query);
    }

    public static function restoreCategory($catID) {
        $query = "Update category Set IsRemoved = 0 Where CatID = '$catID'";

        DataProvider::ExecuteQuery($query);
    }

    public static function insert($catName) {
        $query = "insert into category (CatName) "
                . "values ('$catName')";

        DataProvider::ExecuteQuery($query);
    }

    public static function update($catID, $catName) {
        $query = "Update category Set CatName = '$catName' Where CatID = '$catID'";

        DataProvider::ExecuteQuery($query);
    }

}
