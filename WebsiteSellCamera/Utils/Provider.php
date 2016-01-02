<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Provider
 *
 * @author Lucifer
 */
require_once 'entities/User.php';

class Provider {

    public static function Redirect($url) {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: $url");
    }

    public static function IsLogged() {

        $result = false;

        if (isset($_SESSION["Username"])) {
            $result = true;
        } else {
            if (isset($_COOKIE["Username"])) {

                $username = $_COOKIE["Username"];
                $u = User::getUserByUsername($username);

                $_SESSION["Username"] = $u->getUsername();

                $result = true;
            }
        }

        return $result;
    }

    public static function getUsername() {
        return $_SESSION["Username"];
    }

    public static function destroy() {

        $_SESSION["Username"] = null;
        unset($_SESSION["Username"]);

        unset($_SESSION["Cart"]);

        if (isset($_COOKIE["Username"])) {
            unset($_COOKIE["Username"]);
            setcookie("Username", '', time() - 3600);
        }
    }

}
