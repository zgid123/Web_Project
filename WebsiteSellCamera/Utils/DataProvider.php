<?php

define("SERVER", "localhost");
define("DB", "dulieumayanh");
define("UID", "root");
define("PWD", "");

class DataProvider {

    public static function ExecuteQuery($query) {
        $cn = new mysqli(SERVER, UID, PWD, DB);
        if ($cn->connect_errno) {
            die("Failed to connect to MySQL: (" . $cn->connect_errno . ") " . $cn->connect_error);
        }

        $cn->query("set names 'utf8'");
        $resultSet = $cn->query($query);
        return $resultSet;
    }

    public static function ExecuteNonQueryGetID($query) {
        $cn = new mysqli(SERVER, UID, PWD, DB);
        if ($cn->connect_errno) {
            die("Failed to connect to MySQL: (" . $cn->connect_errno . ") " . $cn->connect_error);
        }

        $cn->query("set names 'utf8'");
        $cn->query($query);

        return $cn->insert_id;
    }

    public static function ChangeURL($path) {
        echo '<script type = "text/javascript">';
        echo 'location = "' . $path . '";';
        echo '</script>';
    }

}
