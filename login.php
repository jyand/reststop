<?php
require ("lib.php") ;
include_once("cred.php");
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
        die('<p class="error">Sorry!</p>') ;
        echo "<p>We are having connection issues.</p><p>Please try again later.</p>" ;
}
else {
        session_start() ;
        $_SESSION["user"] = addslashes(trim($_POST["email"])) ;
        $key = md5(trim($_POST["password"])) ;
        $mysqlstr = "SELECT * FROM User WHERE Email = '{$_SESSION['user']}' AND Password = '{$key}' ;" ;
        $result = $conn->query($mysqlstr) ;
        if ($result->num_rows > 0) {
                $row = $result->fetch_assoc() ;
                session_id($row["UID"]) ;
                header("Location: home.php") ;
        }
        else {
                die("<p>Please enter valid login credentials.</p>") ;
                session_destroy() ;
        }
}
?>
