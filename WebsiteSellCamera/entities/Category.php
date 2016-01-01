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

    var $CatID, $CatName;

    public function getCatID() {
        return $this->CatID;
    }

    public function getCatName() {
        return $this->CatName;
    }

    public function setCatID($id) {
        $this->CatID = $id;
    }

    public function setCatName($name) {
        $this->CatName = $name;
    }

    public function __construct($id, $name) {
        $this->CatID = $id;
        $this->CatName = $name;
    }

    public static function getCategory($query = "Select CatID, CatName From category") {
        $result = array();

        $category = DataProvider::ExecuteQuery($query);

        while ($row = $category->fetch_assoc()) {
            array_push($result, new Category($row["CatID"], $row["CatName"]));
        }

        return $result;
    }

    public static function getCategoryByID($catID) {
        $query = "Select CatID, CatName From category Where CatID = $catID";

        $category = null;

        $result = DataProvider::ExecuteQuery($query);

        if ($row = $result->fetch_assoc()) {
            $category = new Category($row["CatID"], $row["CatName"]);
        }

        return $category;
    }

}
