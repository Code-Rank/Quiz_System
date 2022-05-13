<?PHP
session_start();
unset($_SESSION["cat"]);
unset($_SESSION["email"]);
session_destroy();
header("Location:Views/LogIn_View.php");
?>