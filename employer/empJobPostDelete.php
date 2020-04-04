<?php
include"../inc/header.php";
include "EmployerInsideCode.php";
Session::checkSessionEmployer();
?>

<?php
if(($_GET['action'] == 'delete') && isset($_GET['jobPostID'])) { 

$JobPostDeleteObject = NEW EmployerInsideCode();
$JobPostDeleteObject->empJobPostDelete($_GET['jobPostID']);

   }
?>

<?php require"../inc/footer.php"?>

