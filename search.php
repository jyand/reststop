<?php
require ("lib.php") ;
if(isset($_POST["zip"])) {
        $searchzip = trim($_POST["zip"]) ;
        if(isset($_POST["bname"])) {
                $searchname = addslashes($_POST["bname"]) ;
                $results = dbsearch($searchname, $searchzip) ;
        }
        else {
                $results = dbsearch("", $searchzip) ;
        }
        if ($results->num_rows > 0) {
                while ($row = $results->fetch_asssoc()) {
                        echo "<p>Public Bathroom?: {$row['HasPublic']} Store: {$row['Name']} Address: {$row['Address']} {$row['City']} {$row['State']}</p>" ;
                }
        }
        else {
                echo "Sorry, we could not find anything." ;
        }
}
//$conn->close() ;
?>
