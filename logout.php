<?php
session_destroy() ;
$conn->close() ;
header("Location: signin.html") ; 
?>
