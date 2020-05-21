<?php
require ("lib.php") ;
$searchname = addslashes($_POST["bname"]) ;
$searchzip = trim($_POST["bname"]) ;
$results = dbsearch($searchname, $searchzip) ;
if ($results->num_rows > 0) {
        while ($row = $results->fetch_asssoc()) {
                echo "<p>Public Bathroom?: {$row['HasPublic']} Store: {$row['Name']} Address: {$row['Address']} {$row['City']} {$row['State']}</p>" ;
        }
}
else {
        echo "Sorry, we could not find anything." ;
}
//$conn->close() ;
?>
