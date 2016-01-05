<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Order
 *
 * @author Lucifer
 */
require_once 'Utils/DataProvider.php';

class Order {

    var $OrderID, $OrderDate, $UserID, $Total;

    public function getOrderID() {
        return $this->OrderID;
    }

    public function getOrderDate() {
        return $this->OrderDate;
    }

    public function getUserID() {
        return $this->UserID;
    }

    public function getTotal() {
        return $this->Total;
    }

    public function setOrderID($OrderID) {
        $this->OrderID = $OrderID;
    }

    public function setOrderDate($OrderDate) {
        $this->OrderDate = $OrderDate;
    }

    public function setUserID($UserID) {
        $this->UserID = $UserID;
    }

    public function setTotal($Total) {
        $this->Total = $Total;
    }

    public function __construct($OrderID, $OrderDate, $UserID, $Total) {
        $this->OrderID = $OrderID;
        $this->OrderDate = $OrderDate;
        $this->UserID = $UserID;
        $this->Total = $Total;
    }

    public function insert() {
        $d = date('Y-m-d H:i:s', $this->OrderDate);
        $userID = $this->UserID;
        $total = $this->Total;

        $query = "insert into orders (OrderDate, UserID, Total) "
                . "values ('$d', '$userID', '$total')";

        $this->OrderID = DataProvider::ExecuteNonQueryGetID($query);
    }

}
