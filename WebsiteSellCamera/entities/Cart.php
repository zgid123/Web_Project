<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cart
 *
 * @author Lucifer
 */
class Cart {

    public static function printCart() {
        print_r($_SESSION["Cart"]);
    }

    public static function count() {
        $result = 0;

        if (isset($_SESSION["Cart"])) {
            foreach ($_SESSION["Cart"] as $ProID => $Quantity) {
                $result += $Quantity;
            }
        }

        return $result;
    }

    public static function updateCart() {
        if (Cart::count() > 0) {
            foreach ($_SESSION["Cart"] as $proID => $Quantity) {
                $result = Product::getQuantityByProID($proID);

                if ($Quantity > $result) {
                    $_SESSION["Cart"][$proID] = $result;
                }
            }
        }
    }

    public static function totalPrice() {
        $total = 0;

        if (Cart::count() > 0) {
            foreach ($_SESSION["Cart"] as $proID => $Quantity) {
                $result = Product::getPriceByProID($proID);           
                        
                $total += $result * $Quantity;
            }
        }
        
        return $total;
    }

    public static function addItem($ProID, $Quantity) {
        if (array_key_exists($ProID, $_SESSION["Cart"])) {
            $_SESSION["Cart"][$ProID] += $Quantity;
        } else {
            $_SESSION["Cart"][$ProID] = $Quantity;
        }
    }

    public static function removeItem($ID) {
        foreach ($_SESSION["Cart"] as $ProID => $Quantity) {
            if ($ProID == $ID) {
                unset($_SESSION["Cart"][$ID]);
                return;
            }
        }
    }

    public static function updateItem($ID, $newQuantity) {
        foreach ($_SESSION["Cart"] as $ProID => $Quantity) {
            if ($ProID == $ID) {
                $_SESSION["Cart"][$ID] = $newQuantity;
                return;
            }
        }
    }

    public static function destroyCart() {
        unset($_SESSION["Cart"]);
        $_SESSION["Cart"] = array();
    }

}
