<?php 

if(!session_id()) session_start();

if(!isset($_SESSION['auth_admin'])) header('Location: ../login.php');