<?PHP
session_start();
unset($_SESSION["loginID"]);
session_destroy();
header("Location:Views/AdminLogIn_View.php");
?>