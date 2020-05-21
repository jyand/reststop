#!/bin/php
<?php
echo date("Y-m-d") . "\n" ;
$str = "yo sup" ;
$term = preg_replace("/ /", "%", $str) ;
echo $term . "\n" ;
echo md5("password") ;
?>
