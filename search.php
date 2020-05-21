<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8"/>
        <title>Search Results</title>
        <link href="theme.css" rel=stylesheet type="text/css">
</head>
<body>
<main>
<?php
# query the database for results based on search terms in forms
# a keyword search with one or more characters can be used for the name of a business, it can also be left blank to show all stores in a single town 
# the zip code must be set to obtain results
require_once("cred.php");
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
        die('<p class="error">sorry!</p>') ;
        echo "<p>we are having connection issues.</p><p>please try again later.</p>" ;
}
else {
        if(isset($_GET["zip"])) {

                # Join tables to append the HasPublic (bathroom) boolean value to the results
                $mysqlstr = "SELECT * FROM Business, Review WHERE Zip = Business.'{$_GET['zip']}' AND Business.'BID' = Review.'BID'" ;
                # the name field uses MySQL wildcards for all entries containing all words separated by spaces in the search term
                if(isset($_GET["bname"])) {
                        $word = addslashes($_GET["bname"]) ;
                        $term = preg_replace("/ /", "%", $word) ;
                        $term = "%" . $term . "%" ;
                        $mysqlstr .= " AND Business.Name LIKE '{$term}'" ;
                }
                $result = $conn->query($mysqlstr) ;
                if ($result->num_rows > 0) {
                        foreach ($result as $row) {
                                echo "<p>Store: {$row['Name']} Address: {$row['Address']} {$row['City']} {$row['State']} Public Bathroom?: {$row['HasPublic']}" ;
                        }
                }
                else {
                        echo "<p>Sorry, we could not find anything.</p>" ;
                }
        }
}
$conn->close() ;
?>
</main>
</body>
</html>
