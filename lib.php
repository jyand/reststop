<?php
//$conn->close() ; in page script after any funcs using mysql execute

# 'Library': function wrapper for routines used in pages
# The purpose is to abstract details of back-end operations from the user.

function dbconnect() {
include_once("cred.php");
        $conn = new mysqli($host, $user, $pass, $db);
        if ($conn->connect_error) {
                die('<p class="error">sorry!</p>') ;
                echo "<p>we are having connection issues.</p><p>please try again later.</p>" ;
                return false ;
        }
        else {
                return TRUE ;
        }
}

# validates the password server-side when creating a new user account
function passwdcheck($password, $confirmpw) {
        $regex = array("/[A-Z]/", "/[0-9]/", "/[a-z]/") ;
        $minchar = 8 ;
        if (strlen($password) >= $minchar && $password === $confirmpw) {
                $valid = TRUE ;
                foreach ($regex as $temp) {
                        if (!preg_match($temp, $password)) {
                                $valid = FALSE ;
                        }
                }
                unset($temp) ;
        }
        else {
                $valid = FALSE ;
        }
        return $valid ;
}

# adds user information to the database, formats and encrypts password
# email is validated client-side, password is validated server-side
function useradd($email, $password, $confirm) {
        require_once("cred.php");
        $conn = new mysqli($host, $user, $pass, $db);
        if ($conn->connect_error) {
                die('<p class="error">Sorry!</p>') ;
                echo "<p>We are having connection issues.</p><p>Please try again later.</p>" ;
        }
        if (passwdcheck($password, $confirm) === TRUE) {
                $password = md5(trim($password)) ;
                $joindate = date("Y-m-d") ;
                $mysqlstr = "INSERT INTO User (Email, Password, JoinDate) VALUES ('{$email}', '{$password}', '{$joindate}')" ;
                $conn->query($mysqlstr) ;
                return TRUE ;
        }
        else {
                return FALSE ;
        }
}

# query the database for results based on search terms in forms
# a keyword search with one or more characters can be used for the business
# the zip code must be set to obtain results
function dbsearch($bname, $zip) {
        if (dbconnect() !== FALSE) {
                $mysql = "SELECT * FROM Zip WHERE Name = '{$zip}'" ;
        }
        if (isset($bname)) {
                $term = preg_replace("/ /", "%", $bname) ;
                $term = "%" . $term . "%" ;
                $mysqlstr .= " AND Name LIKE '{$bname}'" ;
        }
        if (isset($mysqlstr)) {
                $mysqlstr .= ";" ;
        }
        return $conn->query($mysqlstr) ;
}

# inserts record into the database when a user posts a review
# js code in the page ensure correct data and that no forms are blank
function postreview(...$inputs) {
        // fix this: business data inserts into business but rating and haspublic go into review
        $mysqlstr = "INSERT INTO Business (Name, Address, City, State, Zip) VALUES(" ;
        foreach ($input as $temp) {
                $temp = addslashes($temp) ;
                $mysqlstr .= "{$temp}, " ;
        }
        $mysqlstr .= ") ;" ;
}

?>
