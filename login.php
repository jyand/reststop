<?php
require ("lib.php") ;
if (dbconnect() !== FALSE) {
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
