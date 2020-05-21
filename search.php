<?php
require_once("cred.php");
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
        die('<p class="error">sorry!</p>') ;
        echo "<p>we are having connection issues.</p><p>please try again later.</p>" ;
}
else {
        if(isset($_POST["zip"])) {
                $mysql = "SELECT * FROM Zip WHERE Zip = '{$_POST['zip']}'" ;
                if(isset($_POST["bname"])) {
                        $word = addslashes($_POST["bname"]) ;
                        $term = preg_replace("/ /", "%", $word) ;
                        $term = "%" . $term . "%" ;
                        $mysqlstr .= " AND Name LIKE '{$word}'" ;
                }
                $conn->query($mysqlstr) ;
                if ($results->num_rows > 0) {
                        while ($row = $results->fetch_asssoc()) {
                                echo "<p>Public Bathroom?: {$row['HasPublic']} Store: {$row['Name']} Address: {$row['Address']} {$row['City']} {$row['State']}</p>" ;
                        }
                }
                else {
                        echo "Sorry, we could not find anything." ;
                }
        }
}
//$conn->close() ;
?>
