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

    var $ManufacturerID, $ManufacturerName, $IsRemoved;

    public function getMFID() {
        return $this->ManufacturerID;
    }

    public function getMFName() {
        return $this->ManufacturerName;
    }

    public function getIsRemoved() {
        return $this->IsRemoved;
    }

    public function setIsRemoved($status) {
        $this->IsRemoved = $status;
    }

    public function setMFID($id) {
        $this->ManufacturerID = $id;
    }

    public function setMFName($name) {
        $this->ManufacturerName = $name;
    }

    public function __construct($id, $name, $status) {
        $this->ManufacturerID = $id;
        $this->ManufacturerName = $name;
        $this->IsRemoved = $status;
    }

    public static function getManufacturer($query = "Select ManufacturerID, ManufacturerName From manufacturer Where IsRemoved = 0") {
        $result = array();

        $manufacturer = DataProvider::ExecuteQuery($query);

        while ($row = $manufacturer->fetch_assoc()) {
            array_push($result, new Manufacturer($row["ManufacturerID"], $row["ManufacturerName"], 0));
        }

        return $result;
    }

    public static function getManufacturerByID($mfID) {
        $query = "Select ManufacturerID, ManufacturerName From manufacturer Where ManufacturerID = $mfID";

        $manufacturer = null;

        $result = DataProvider::ExecuteQuery($query);

        if ($row = $result->fetch_assoc()) {
            $manufacturer = new Manufacturer($row["ManufacturerID"], $row["ManufacturerName"], 0);
        }

        return $manufacturer;
    }

    public static function getManufacturerForAdmin($query = "Select ManufacturerID, ManufacturerName, IsRemoved From manufacturer") {
        $result = array();

        $manufacturer = DataProvider::ExecuteQuery($query);

        while ($row = $manufacturer->fetch_assoc()) {
            array_push($result, new Manufacturer($row["ManufacturerID"], $row["ManufacturerName"], $row["IsRemoved"]));
        }

        return $result;
    }

    public static function removeManufacturer($mfID) {
        $query = "Update manufacturer Set IsRemoved = 1 Where ManufacturerID = '$mfID'";

        DataProvider::ExecuteQuery($query);
    }

    public static function restoreManufacturer($mfID) {
        $query = "Update manufacturer Set IsRemoved = 0 Where ManufacturerID = '$mfID'";

        DataProvider::ExecuteQuery($query);
    }

    public static function getManufacturerBySearching($mfName) {
        $result = array();

        $query = "Select ManufacturerID, ManufacturerName From manufacturer Where ManufacturerName Like '%$mfName%'";

        $manufacturer = DataProvider::ExecuteQuery($query);

        while ($row = $manufacturer->fetch_assoc()) {
            array_push($result, new Manufacturer($row["ManufacturerID"], $row["ManufacturerName"], 0));
        }

        return $result;
    }

}
