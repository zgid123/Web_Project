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

    var $OrderID, $OrderDate, $UserID, $Total, $Delivered;

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

    public function getDelivered() {
        return $this->Delivered;
    }

    public function setDelivered($status) {
        $this->Delivered = $status;
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

    public function __construct($OrderID, $OrderDate, $UserID, $Total, $Delivered) {
        $this->OrderID = $OrderID;
        $this->OrderDate = $OrderDate;
        $this->UserID = $UserID;
        $this->Total = $Total;
        $this->Delivered = $Delivered;
    }

    public function insert() {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $d = date('Y-m-d H:i:s', $this->OrderDate);

        $userID = $this->UserID;
        $total = $this->Total;

        $query = "insert into orders (OrderDate, UserID, Total) "
                . "values ('$d', '$userID', '$total')";

        $this->OrderID = DataProvider::ExecuteNonQueryGetID($query);
    }

    public static function getOrder($query = "Select OrderID, OrderDate, UserID, Total, Delivered From orders Order by OrderDate DESC") {
        $result = array();

        $order = DataProvider::ExecuteQuery($query);

        while ($row = $order->fetch_assoc()) {
            array_push($result, new Order($row["OrderID"], $row["OrderDate"], $row["UserID"], $row["Total"], $row["Delivered"]));
        }

        return $result;
    }

    public static function deliveredOrder($orderID) {
        $query = "Update orders Set Delivered = 1 Where OrderID = '$orderID'";

        DataProvider::ExecuteQuery($query);
    }

    public static function undoOrder($orderID) {
        $query = "Update orders Set Delivered = 0 Where OrderID = '$orderID'";

        DataProvider::ExecuteQuery($query);
    }

    public static function getOrderBySearching($date) {
        $result = array();

        $max = substr($date, 6, 4) . "-" . substr($date, 3, 2) . "-" . substr($date, 0, 2) . " 23:59:59";
        $min = substr($date, 6, 4) . "-" . substr($date, 3, 2) . "-" . substr($date, 0, 2) . " 00:00:00";

        $query = "Select OrderID, OrderDate, UserID, Total, Delivered From orders "
                . "Where OrderDate >= '$min' && OrderDate <= '$max' "
                . "Order by OrderDate DESC";

        $order = DataProvider::ExecuteQuery($query);

        while ($row = $order->fetch_assoc()) {
            array_push($result, new Order($row["OrderID"], $row["OrderDate"], $row["UserID"], $row["Total"], $row["Delivered"]));
        }

        return $result;
    }

}
