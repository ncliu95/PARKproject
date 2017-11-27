<?php
session_start();
session_destroy();
	unset($_SESSION['ptUserSession']);
	unset($_SESSION['phyUserSession']);
	header("Location: index.html");
if (!isset($_SESSION['ptUserSession'])!="") {
    header("Location: index.html");
    exit;
} else if (!isset($_SESSION['phyUserSession'])!=""){
    header("Location: index.html.php");
}
if (isset($_SESSION['ptUserSession'])!="") {
    header("Location: patient-profile.php");
    exit;
} else if (isset($_SESSION['phyUserSession'])!=""){
    header("Location: doctor-profile.php");
}
?>