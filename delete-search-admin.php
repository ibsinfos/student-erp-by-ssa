<?php
include_once 'includes/db_connect.php';
session_start();
if (!isset($_SESSION['aai']))
  {header("Location: login-index.php");
}
$id=$_POST["uname"];
$_SESSION['showdelete']=0;


$table_found_sql = "SELECT * FROM admin where userid='$id'";
$table_found_result = $conn->query($table_found_sql);
if ($table_found_result->num_rows > 0) {
    session_start();
    $row = mysqli_fetch_array($table_found_result);
    $_SESSION['dtable_found']=$table_found;
    $_SESSION['duserid']=$row['userid'];
    $_SESSION['dfname']=$row['fname'];
    $_SESSION['dmname']=$row['mname'];
    $_SESSION['dlname']=$row['lname'];
    $_SESSION['daddress']=$row['address'];
    $_SESSION['demail']=$row['email'];

    $_SESSION['dpost']=$row['post'];
    $_SESSION['dimage']=$row['image'];
    $_SESSION['searched']="1";
    $_SESSION['delete']='1';
    $_SESSION['showdelete']='1';
    header("Location: tab-admin.php");
}
else{
    session_start();
    $_SESSION['search-errord'] = '*User ID not fount';
    $_SESSION['delete']='1';
    $_SESSION['showdelete']='0';
    header("Location: tab-admin.php");
}
?>
