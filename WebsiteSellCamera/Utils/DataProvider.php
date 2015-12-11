<?php

define("SERVER", "localhost");
define("DB", "banmayanh");
define("UID", "root");
define("PWD", "");

class DataProvider {

    public static function ExecuteQuery($sql) {
        $cn = new mysqli(SERVER, UID, PWD, DB);
        if ($cn->connect_errno) {
            die("Failed to connect to MySQL: (" . $cn->connect_errno . ") " . $cn->connect_error);
        }

        $cn->query("set names 'utf8'");
        $resultSet = $cn->query($sql);
        return $resultSet;
    }

    public static function ChangeURL($path) {
        echo '<script type = "text/javascript">';
        echo 'location = "' . $path . '";';
        echo '</script>';
    }

}

?>
