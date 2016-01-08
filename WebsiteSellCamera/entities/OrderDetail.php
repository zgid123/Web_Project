<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OrderDetail
 *
 * @author Lucifer
 */
require_once 'Utils/DataProvider.php';

class OrderDetail {

    var $ID, $OrderID, $ProID, $Quantity, $Price, $Amount;

    public function getID() {
        return $this->ID;
    }

    public function getOrderID() {
        return $this->OrderID;
    }

    public function getProID() {
        return $this->ProID;
    }

    public function getQuantity() {
        return $this->Quantity;
    }

    public function getPrice() {
        return $this->Price;
    }

    public function getAmount() {
        return $this->Amount;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function setOrderID($OrderID) {
        $this->OrderID = $OrderID;
    }

    public function setProID($ProID) {
        $this->ProID = $ProID;
    }

    public function setQuantity($Quantity) {
        $this->Quantity = $Quantity;
    }

    public function setPrice($Price) {
        $this->Price = $Price;
    }

    public function setAmount($Amount) {
        $this->Amount = $Amount;
    }

    public function __construct($ID, $OrderID, $ProID, $Quantity, $Price, $Amount) {
        $this->ID = $ID;
        $this->OrderID = $OrderID;
        $this->ProID = $ProID;
        $this->Quantity = $Quantity;
        $this->Price = $Price;
        $this->Amount = $Amount;
    }

    public function insert() {

        $query = "insert into orderdetails (OrderID, ProID, Quantity, Price, Amount) "
                . "values($this->OrderID, $this->ProID, $this->Quantity, $this->Price, $this->Amount)";

        DataProvider::ExecuteQuery($query);
    }

    public static function getOrderDetailByOrderID($orderID) {
        $query = "Select ID, OrderID, ProID, Quantity, Price, Amount From orderdetails Where OrderID = '$orderID'";

        $result = array();

        $detail = DataProvider::ExecuteQuery($query);

        while ($row = $detail->fetch_assoc()) {
            array_push($result, new OrderDetail($row["ID"], $row["OrderID"], $row["ProID"], $row["Quantity"], $row["Price"], $row["Amount"]));
        }

        return $result;
    }

}
