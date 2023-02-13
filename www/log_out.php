<?php

session_start();
unset($_SESSION['login']);
unset($_SESSION['password']);
unset($_SESSION['logtime']);
unset($_SESSION['logsec']);
session_destroy();
header("Location: /../index.php");
exit();

?>