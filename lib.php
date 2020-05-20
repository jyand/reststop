<?php
# 'Library': function wrapper for routines used in pages
# The purpose is to abstract details of back-end operations from the user.

function dbconnect() {
//require_once("credentials.php");
        $conn= new mysqli($host, $user, $pass, $db);
        if ($conn->connect_error) {
                die('<p class="error">Sorry!</p>') ;
                echo "<p>We are having connection issues.</p><p>Please try again later.</p>" ;
                return FALSE ;
        }
        return $conn ;
}

function useradd($email, $password, $conn) {
        $password = md5($password, TRUE) ;
        $joindate = date("Y-m-d") ;
        if (dbconnect()) {
                $mysqlstr = "INSERT INTO Users (Email, Password, JoinDate) VALUES ({$email}, {$password}, {$joindate})" ;
        }
}

function dbsearch() {
}

function postreview() {
}

?>
