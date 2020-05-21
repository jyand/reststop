#!/bin/php
<?php

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
require("lib.php") ;
$validpw = passwdcheck("12345aAb", "12345aAb") ;
if ($validpw === TRUE) {
        echo "this works" ;
}
?>
