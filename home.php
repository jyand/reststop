<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8"/>
<?php
require("lib.php") ;
require("logout.php") ;
require("search.php") ;
if (isset($_SESSION["email"])) {
        echo "<title>Welcome, {$_SESSION['email']}</title>"
        if (dbconnect() !== FALSE) {
                postreview($_POST["bool"], $_POST["bname"], $_POST["addr"], $_POST["city"], $_POST["zip"], "NJ") ;
        }
}
else {
        echo "<title>Please log in.</title>"
}
?>
        <link href="theme.css" rel=stylesheet type="text/css">
</head>
<body>
	<form action="" method="POST">
		<input type="submit" value="logout" />
	</form></br></br>
        <h1>Help others find a public bathroom by contributing:</h1>
	<form action="home.php" method="POST">
		<p>has a public bathroom?: <input type="checkbox" id="bool" name ="bool"/></p>
		<p>Name of Store: <input type="text" id="bname" name="bname"/></p>
		<p>Address: <input type="text" id="addr" name="addr"/></p>
		<p>City: <input type="text" id="city" name ="city"/></p>
		<p>Zip Code: <input type="number" id="zip" name="zip"/></p>
                <p><input type="submit" value="Submit a review!"></p>
	</form>
        <header><h2>Find a Public Bathroom</h2></header>
        <main>
                <form method="GET" action="search.php">
                <label for="search">
                        <p>Store: <input type="text" id="bname" name="bname">
                        Zip Code: <input type="text" id="zip" name="zip"></p>
                        <p><input type="submit" value="search your location"></p>
                </label>
                </form></br>
                <p><img src="img/br.jpeg" width="170" height="200"></p>
        </main>
        <footer>&copy;Copyright 2020 - John DeSalvo</footer>
</body>
</html>