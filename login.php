<?php
include_once 'includes/db_connect.php';
session_start();
$id=$_SESSION['id'];
if($_SESSION['type']=="a")
{

	$sql = "SELECT * FROM admin where userid='$id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {

    $_SESSION['aai'] = 1;
    $_SESSION['id']=$id;
    $row = mysqli_fetch_array($result);
    $_SESSION['username']=$row['fname']." ".$row['mname']." ".$row['lname'];
    $_SESSION['fname']=$row['fname'];
    $_SESSION['mname']=$row['mname'];
    $_SESSION['lname']=$row['lname'];
    $_SESSION['email']=$row['email'];
    $_SESSION['address']=$row['address'];
    $_SESSION['image']=$row['image'];
    echo $row['image'];

    header("Location: admin-index.php");
}
}
elseif($_SESSION['type']=="t")
{

	$sql = "SELECT * FROM teacher where userid='$id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {

    $_SESSION['ati'] = 1;
    $_SESSION['id']=$id;
    $row = mysqli_fetch_array($result);
    $_SESSION['username']=$row['fname']." ".$row['mname']." ".$row['lname'];
    $_SESSION['fname']=$row['fname'];
    $_SESSION['mname']=$row['mname'];
    $_SESSION['lname']=$row['lname'];
    $_SESSION['email']=$row['email'];
    $_SESSION['address']=$row['address'];
    $_SESSION['image']=$row['image'];
    echo $row['image'];

    header("Location: teacher-index.php");
}
}
elseif($_SESSION['type']=="o")
{

	$sql = "SELECT * FROM office where userid='$id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {

    $_SESSION['aoi'] = 1;
    $_SESSION['id']=$id;
    $row = mysqli_fetch_array($result);
    $_SESSION['username']=$row['fname']." ".$row['mname']." ".$row['lname'];
    $_SESSION['email']=$row['email'];
    $_SESSION['address']=$row['address'];
    $_SESSION['image']=$row['image'];
    //echo $row['image'];

    header("Location: office-index.php");
}
}
elseif($_SESSION['type']=="s")
{

	$result = $conn->query("SHOW TABLES from erp LIKE '%db'");
            $tables="";
            $i=0;
            while ($row = mysqli_fetch_array($result)) {
                $tables = $row[$i];
                $search_sql = "SELECT * FROM `{$tables}` where userid='$id' ";
                $search_result = $conn->query($search_sql);
                if ($search_result->num_rows > 0) {
                    $table_found = $tables;
                    echo $table_found;
                }
            }
            $table_found_sql = "SELECT * FROM `{$table_found}` where userid='$id' ";
            $table_found_result = $conn->query($table_found_sql);
            if ($table_found_result->num_rows > 0) {
                session_start();
                $_SESSION['id']=$id;
                $_SESSION['stf'] = $table_found;
                echo $_SESSION['stf'];
                $_SESSION['asi'] = 1;
                $row = mysqli_fetch_array($table_found_result);


                $_SESSION['foundtable']=substr($table_found,0,-2);
                header("Location: student-index.php");
}
}

$conn->close();
?>





