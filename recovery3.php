<?php
session_start();
$input_username=$_SESSION["username"];
$newPassword1=$_POST["newPassword1"];
$newPassword2=$_POST["newPassword2"];
if($newPassword1==$newPassword2){
$host="localhost";
$password="";
$user="root";
$database="credentials";
$conn=mysqli_connect($host,$user,$password,$database);
$query="update credentials1 set Password=? where Username=?;";
$configuring_query=mysqli_prepare($conn,$query);
mysqli_stmt_bind_param($configuring_query,"ss",$newPassword1,$input_username);
mysqli_stmt_execute($configuring_query);
header("Location:mainR.html");
die();
}
else{
$failFileName="rrecovery2.html";
header("Location:$failFileName");
}
?>