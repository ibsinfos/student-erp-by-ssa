<?php
include_once 'includes/db_connect.php';
session_start();
if (!isset($_SESSION['aai']))
    {header("Location: login-index.php");
}
//$name=$_POST["uid"];
//$name_padded = sprintf("%03d", $name);
$password=SHA1(12345678);
$balance=0;
$fname=$_POST["firstname"];
$mname=$_POST["middlename"];
$lname=$_POST["lastname"];
$address=$_POST["address"];
$email=$_POST["email"];
$tablecreate="CREATE TABLE IF NOT EXISTS admin (
`userid` int(11) AUTO_INCREMENT PRIMARY KEY,
`password` varchar(40) NOT NULL,
`fname` varchar(50) NOT NULL,
`mname` varchar(50) NOT NULL,
`lname` varchar(50) NOT NULL,
`address` varchar(100) NOT NULL,
`email` varchar(50) NOT NULL,
`image` varchar(1024)
)";
if($conn->query($tablecreate)===TRUE){
    $start="100";
    $startset="alter table office AUTO_INCREMENT=".$start."";
    $conn->query($startset);
}
$sql = "INSERT INTO admin (password,fname,mname,lname,address,email) VALUES ('$password','$fname','$mname','$lname','$address','$email')";
if ($conn->query($sql) === TRUE) {
    $maxuseridsql = mysqli_query($conn, "SELECT MAX(userid) AS maxuserid FROM admin");
    $row = mysqli_fetch_assoc($maxuseridsql);
    $maxuserid = $row['maxuserid'];
    $_SESSION['added']="Staff added with USER ID :".$maxuserid." default password 12345678";
    $_SESSION['add']=1;
    header("Location: tab-admin.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>