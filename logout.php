<?php
if (isset($_SESSION["UID"])) {
session_destroy() ;
}
header("Location: signin.php") ; 
?>
