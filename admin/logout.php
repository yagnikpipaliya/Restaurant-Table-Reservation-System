<?php
session_start();
unset($_SESSION["user"]);
//header("location:index.php");
echo '<meta http-equiv="refresh" content="1; URL=index.php" />';
?>