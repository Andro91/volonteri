<?php
	session_start();
	if(!isset($_SESSION['userid'])) $_SESSION['userid'] = "-1";
	if(!isset($_SESSION['name'])) $_SESSION['name'] = "none";
	if(!isset($_SESSION['logon'])) $_SESSION['logon'] = false;
?>