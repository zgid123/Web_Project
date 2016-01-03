<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Lucifer
 */
require_once 'Utils/DataProvider.php';

class User {

    var $ID, $Username, $Password, $FirstName, $LastName, $Email, $PhoneNumber, $Address, $Permission;

    public function getID() {
        return $this->ID;
    }

    public function getUsername() {
        return $this->Username;
    }

    public function getPassword() {
        return $this->Password;
    }

    public function getFirstName() {
        return $this->FirstName;
    }

    public function getLastName() {
        return $this->LastName;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function getAddress() {
        return $this->Address;
    }

    public function getPhoneNumber() {
        return $this->PhoneNumber;
    }

    public function getPermission() {
        return $this->Permission;
    }

    public function setID($id) {
        $this->ID = $id;
    }

    public function setUsername($username) {
        $this->Username = $username;
    }

    public function setPassword($password) {
        $this->Password = $password;
    }

    public function setFirstName($firstName) {
        $this->FirstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->LastName = $lastName;
    }

    public function setEmail($mail) {
        $this->Email = $mail;
    }

    public function setAddress($address) {
        $this->Address = $address;
    }

    public function setPhoneNumber($phone) {
        $this->PhoneNumber = $phone;
    }

    public function setPermission($permission) {
        $this->Permission = $permission;
    }

    public function __construct($ID, $Username, $Password, $FirstName, $LastName, $Email, $PhoneNumber, $Address, $Permission) {
        $this->ID = $ID;
        $this->Username = $Username;
        $this->Password = $Password;
        $this->FirstName = $FirstName;
        $this->LastName = $LastName;
        $this->Email = $Email;
        $this->Address = $Address;
        $this->PhoneNumber = $PhoneNumber;
        $this->Permission = $Permission;
    }

    public static function getUserByUsername($username) {
        $query = "Select ID, Username, Password, FirstName, LastName, Email, PhoneNumber, Address, Permission From users "
                . "Where Username = '$username'";
        $user = null;

        $result = DataProvider::ExecuteQuery($query);

        if ($row = $result->fetch_assoc()) {
            $user = new User($row["ID"], $row["Username"], $row["Password"], $row["FirstName"], $row["LastName"], $row["Email"], $row["PhoneNumber"], $row["Address"], $row["Permission"]);
        }

        return $user;
    }

    public function insert() {
        $username = str_replace("'", "''", $this->Username);
        $password = md5($this->Password);
        $firstName = str_replace("'", "''", $this->FirstName);
        $lastName = str_replace("'", "''", $this->LastName);
        $email = str_replace("'", "''", $this->Email);
        $address = str_replace("'", "''", $this->Address);
        $phone = str_replace("'", "''", $this->PhoneNumber);

        $query = "insert into users (Username, Password, FirstName, LastName, Email, PhoneNumber, Address, Permission) "
                . "values ('$username', '$password', '$firstName', '$lastName', '$email', '$phone', '$address', $this->Permission)";

        DataProvider::ExecuteQuery($query);
    }

    public function update() {
        $id = $this->ID;
        $username = str_replace("'", "''", $this->Username);
        $password = md5($this->Password);
        $firstName = str_replace("'", "''", $this->FirstName);
        $lastName = str_replace("'", "''", $this->LastName);
        $email = str_replace("'", "''", $this->Email);
        $address = str_replace("'", "''", $this->Address);
        $phone = str_replace("'", "''", $this->PhoneNumber);
        $permission = $this->Permission;

        $query = "update users "
                . "set Username = $username, Password = $password, FirstName = $firstName, LastName = $lastName, "
                . "Email = $email, PhoneNumber = $phone, Address = $address, Permission = $permission "
                . "where ID = $id";

        DataProvider::ExecuteQuery($query);
    }

    public function updateInfor() {
        $id = $this->ID;
        $firstName = str_replace("'", "''", $this->FirstName);
        $lastName = str_replace("'", "''", $this->LastName);
        $email = str_replace("'", "''", $this->Email);
        $address = str_replace("'", "''", $this->Address);
        $phone = str_replace("'", "''", $this->PhoneNumber);

        $query = "update users "
                . "set FirstName = '$firstName', LastName = '$lastName', "
                . "Email = '$email', PhoneNumber = '$phone', Address = '$address' "
                . "where ID = $id";

        DataProvider::ExecuteQuery($query);
    }

    public function updatePassword() {
        $id = $this->ID;
        $password = $this->Password;

        $query = "update users "
                . "set Password = '$password' "
                . "where ID = '$id'";

        DataProvider::ExecuteQuery($query);
    }

    public function login() {
        $result = false;

        $username = str_replace("'", "''", $this->Username);
        $password = md5($this->Password);

        $query = "Select ID, FirstName, LastName, Email, PhoneNumber, Address, Permission From users "
                . "Where Username = '$username' and Password = '$password'";

        $user = DataProvider::ExecuteQuery($query);

        if ($row = $user->fetch_assoc()) {
            $this->ID = $row["ID"];
            $this->FistName = $row["FirstName"];
            $this->LastName = $row["LastName"];
            $this->Email = $row["Email"];
            $this->PhoneNumber = $row["PhoneNumber"];
            $this->Address = $row["Address"];
            $this->Permission = $row["Permission"];

            $result = true;
        }

        return $result;
    }

    public static function isExistsUser($username) {
        $query = "Select ID From users "
                . "Where Username = '$username'";

        $id = DataProvider::ExecuteQuery($query);

        if ($row = $id->fetch_assoc()) {
            return true;
        }

        return false;
    }

}
