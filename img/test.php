#!/bin/php
<?php
require("lib.php") ;
$validpw = passwdcheck("12345aAb", "12345aAb") ;
if ($validpw === TRUE) {
        echo "this works" ;
}
?>
