<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Manufacturer
 *
 * @author Lucifer
 */
require_once 'Utils/DataProvider.php';

class Manufacturer {

    var $ManufacturerID, $ManufacturerName;

    public function getMFID() {
        return $this->ManufacturerID;
    }

    public function getMFName() {
        return $this->ManufacturerName;
    }

    public function setMFID($id) {
        $this->ManufacturerID = $id;
    }

    public function setMFName($name) {
        $this->ManufacturerName = $name;
    }

    public function __construct($id, $name) {
        $this->ManufacturerID = $id;
        $this->ManufacturerName = $name;
    }

    public static function getManufacturer($query = "Select ManufacturerID, ManufacturerName From manufacturer") {
        $result = array();

        $manufacturer = DataProvider::ExecuteQuery($query);

        while ($row = $manufacturer->fetch_assoc()) {
            array_push($result, new Manufacturer($row["ManufacturerID"], $row["ManufacturerName"]));
        }

        return $result;
    }

    public static function getManufacturerByID($mfID) {
        $query = "Select ManufacturerID, ManufacturerName From manufacturer Where ManufacturerID = $mfID";

        $manufacturer = DataProvider::ExecuteQuery($query);

        if (isset($manufacturer))
            return $manufacturer;
        else
            return null;
    }

}
