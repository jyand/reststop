<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8"/>
        <title>Sign Up Now</title>
        <link href="theme.css" rel=stylesheet type="text/css">
</head>
<body>
<?php
# useradd() calls passwdcheck(), both are in lib.php 
require("lib.php") ;
# format the email address here just for extra SQL-inject protection 
# useradd() formats the password
$added = useradd(addslashes(trim($_POST["email"])), $_POST["password"], $_POST["confirm"]) ;
# If the account is successfully created, a link is generated bringing the user to the sign-in page.
if (isset($_POST["click"])) {
        if ($added === TRUE) {
                echo "<ul><a href=\"signin.php\">User account successfully created! Click here to sign in.</a></ul>" ;
        }
        else {
                echo "<p>  Sorry, please try again.</p>" ;
        }
}
# JS code below does client-side password validation
?>
<script type="text/javascript">
function validemail(){
        var e = document.forms["newuser"]["email"].value ;
        var regex = new RegExp("[a-z0-9]@[a-z0-9]\\.[a-z]") ;
        if (regex.test(e)) {
                return true ;
        }
        else {
                alert("Please enter a valid email address!") ;
                return false ;
        }
}

</script>
        <header><h1>Create an Account</h1></header>
        <main>
                <form name="newuser" method="POST" action="" onsubmit="return validemail()">
                <p>Password must contain at least:</p>
                <p>one lowercase letter</p>
                <p>one uppercase letter</p>
                <p>one number</p>
                <p>Any whitespace will  be ignored.</p>
                <p><label for="create">
                        Email Address: <input type="text" id="email" name="email" required>
                        Password: <input type="password" id="password" name="password" required>
                        Confirm Password: <input type="password" id="confirm" name="confirm" required>
                        <p><input type="submit" id="click" name="click" value="create your account"></p>
                </label>
                </label></p>
                </form>
                <p>Once you sign up you can start posting.</p>
        </main>
</body>
</html>
