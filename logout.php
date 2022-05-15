<?php
include 'function.inc.php';

unset($_SESSION['sess_id']);
unset($_SESSION['mid']);
unset($_SESSION['mtype']);
unset($_SESSION['mname']);
unset($_SESSION['mpos']);
unset($_SESSION['mimg']);
session_regenerate_id();

gotopage('index.php');
?>