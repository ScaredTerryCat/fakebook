<?php
$input_username=$_POST["username"];
$host="localhost";
$password="";
$user="root";
$database="credentials";
$conn=mysqli_connect($host,$user,$password,$database);
$query="select * from credentials1 where Username=?";
$query=mysqli_prepare($conn,$query);
mysqli_stmt_bind_param($query,"s",$input_username);
mysqli_stmt_execute($query);
$result=mysqli_stmt_get_result($query);
if(mysqli_num_rows($result)>0){
$question="";
$answer="";
while($row=$result->fetch_assoc()){
$question=$row["SecurityQuestion"];
$answer=$row["SecurityAnswer"];
}
session_start();
$_SESSION["username"]=$input_username;
$_SESSION["correct_answer"]=$answer;
$_SESSION["question"]=$question;
echo '<!DOCTYPE html>
<html>
<head>
<title>So you forgot your credentials :)</title>
<style>
body{background-color:lightgreen;
margin:0px;
}
div{background-color:grey;}
#banner{background-color:black;}
h1{
border:3px solid white;
background-color:lightgreen;
text-align:center;
display:inline-block;
margin-left:35%;
border-radius:5px;
padding:1%;
}
button{padding:1%;
padding-right:2%;
padding-left:2%;
}
#back{
margin-left:5%;
}
form{
border:3px solid yellow;
background-color:green;
margin-left:25%;
margin-right:25%;
margin-top:3%;
border-radius:10px;
}
input{margin-left:35%;
margin-top:3%;
margin-bottom:2%;
padding:2%;
border:2px solid black;
border-radius:20px;
}
#submit{margin-left:65%;padding:2%;padding-right:3%;padding-left:3%;border:2px solid black;background-color:yellow;
border-radius:0px;
}
</style>
</head>
<body>
<div id="banner"><br><br><h1>Credentials Recovery Page</h1><br></div>
<div>
<br>
<a href="forgot_credentials.html" id="back"><button>Go back</button></a><br><br></div>
<form method="post" action="recovery1.php">
<br>
<h2 style="text-align:center;color:yellow">'.$question.'</h2>
<input id="security_answer" name="security_answer" placeholder="enter here the answer here"></input>
<br>
<input type="submit" id="submit" name="Submit"></input>
<br>
</form>
</body>
</html>
';

}
else{
header("Location:fforgot_credentials.html");
die();
}
?>






























