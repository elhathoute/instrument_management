<?php
//demarer session
session_start();
//supp session
session_destroy();
//redirection to page login
header('location:signin.php');
?>