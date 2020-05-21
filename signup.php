<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8"/>
        <title>Rest Stop</title>
        <link href="theme.css" rel=stylesheet type="text/css">
</head>
<body>
        <nav><ul>
                <a href="signin.html">Sign In</a>
        </ul></nav></br>       
        <header><h1>Create an Account</h1></header>
        <main>
                <form method="POST" action="">
                <p>Password must contain at least:</p>
                <p>one lowercase letter</p>
                <p>one uppercase letter</p>
                <p>one number</p>
                <p>Any whitespace will  be ignored.</p>
                <p><label for="create">
                        Email Address: <input type="text" id="email" name="email" required>
                        Password: <input type="password" id="password" name="password" required>
                        Confirm Password: <input type="password" id="confirm" name="confirm" required>
                        <p><input type="submit" value="create your account"></p>
                </label>
                </label></p>
                </form>
                <p>Once you sign up you can start posting.</p>
<?php
require("lib.php") ;
$connected = dbconnect() ;
$validpw = useradd($_POST["email"], $_POST["password"], $_POST["confirm"]) ;
if ($validpw === TRUE && $connected === TRUE) {
        echo "<ul><a href=\"signin.html\">User account successfully created! Click here to sign in.</a></ul>" ;
}
else {
        echo "<p>Sorry, please try again.</p>" ;
}
?>
        </main>
</body>
</html>
