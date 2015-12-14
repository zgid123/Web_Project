<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Series
 *
 * @author Lucifer
 */
require_once 'Utils/DataProvider.php';

class Series {

    var $SeriesID, $SeriesName;

    public function getSeriesID() {
        return $this->SeriesID;
    }

    public function getSeriesName() {
        return $this->SeriesName;
    }

    public function setSeriesID($id) {
        $this->SeriesID = $id;
    }

    public function setSeriesName($name) {
        $this->SeriesName = $name;
    }

    public function __construct($id, $name) {
        $this->SeriesID = $id;
        $this->SeriesName = $name;
    }

    public static function getSeries($query = "Select SeriesID, SeriesName From series") {
        $result = array();

        $series = DataProvider::ExecuteQuery($query);

        while ($row = $series->fetch_assoc()) {
            array_push($result, new Series($row["SeriesID"], $row["SeriesName"]));
        }

        return $result;
    }

    public static function getSeriesByManufactuerID($id) {
        $result = array();

        $query = "Select SeriesID, SeriesName From series Where ManufacturerID = $id";
        $series = DataProvider::ExecuteQuery($query);

        while ($row = $series->fetch_assoc()) {
            array_push($result, new Series($row["SeriesID"], $row["SeriesName"]));
        }

        return $result;
    }

}
