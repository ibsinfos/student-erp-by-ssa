<?php
include_once 'includes/db_connect.php';
session_start();
if (!isset($_SESSION['aai']))
	{header("Location: login-index.php");
}
echo "here...";
$userid=$_SESSION['duserid'];
$table=$_SESSION['dtable_found'];
$trun = substr($table,0,-2);
$tableat = $trun."am";
$sql = "DELETE FROM users WHERE userid='$userid'"  ;
if ($conn->query($sql) === TRUE) {
	echo "successfully ";
	$_SESSION['deleted']= "Deleted successful of USER ID : ".$_SESSION['duserid'];
	$_SESSION['delete']=1;
	$_SESSION['showdelete']=0;
	$sql1 = "DELETE FROM `{$tableat}` WHERE userid='$userid'";
	$conn->query($sql1);
	header("Location: tab-student.php");
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
unset($_SESSION['duserid']);
unset($_SESSION['dfname']);
unset($_SESSION['dmname']);
unset($_SESSION['dlname']);
unset($_SESSION['demail']);
unset($_SESSION['dyear']);
unset($_SESSION['ddept']);
unset($_SESSION['dimage']);
?>
