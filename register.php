<?php
$alreadyExists_html='
<!DOCTYPE html>
<html>
<head>
<style>
body{background-color:lightgreen;
margin:0px;
}
#banner{
background-color:black;
}
div{background-color:grey;}
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
margin-bottom:3%;
border-radius:10px;
}
input{margin-top:3%;
padding-left:2%;
padding-right:2%;
margin-left:35%;
border:2px solid black;
}
#submit{margin-bottom:3%;
background-color:yellow;
margin-left:65%;
padding-top:2%;
padding-bottom:2%;
padding-right:3%;
padding-left:3%;
}
lighter{color:lightblue;}
#security_answer{margin-bottom:3%;}
</style>
<title>FakeBook register page</title>
</head>
<body>
<div id="banner"><br><br><h1>FakeBook Register Page</h1><br></div>
<div>
<br>
<a href="index.html" id="back"><button>Go back</button></a><br><br></div>
<form method="post" action="register.php">
<br>
<input id="username" name="username" placeholder="Enter here new username" required></input>
<br>
<input id="password" name="password" placeholder="Enter here new password" required></input>
<br>
<input id="password_again" name="password_again" placeholder="Reenter here new password" required></input>
<br>
<input id="security_question" name="security_question" placeholder="Enter here security question" required><lighter>  In case you forget your password</lighter></input>
<br>
<input id="security_answer" name="security_answer" placeholder="Enter here security answer" required><lighter>  Know this to reset your password</lighter></input>
<br>
<input type="submit" id="submit" name="Submit"></input>
<h3 style="color:yellow;text-align:center;">!!!This account already exists!!!</h3>
</form>
</body>
</html>';





$different_passwords_html='
<!DOCTYPE html>
<html>
<head>
<style>
body{background-color:lightgreen;
margin:0px;
}
#banner{
background-color:black;
}
div{background-color:grey;}
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
margin-bottom:3%;
border-radius:10px;
}
input{margin-top:3%;
padding-left:2%;
padding-right:2%;
margin-left:35%;
border:2px solid black;
}
#submit{margin-bottom:3%;
background-color:yellow;
margin-left:65%;
padding-top:2%;
padding-bottom:2%;
padding-right:3%;
padding-left:3%;
}
lighter{color:lightblue;}
#security_answer{margin-bottom:3%;}
</style>
<title>FakeBook register page</title>
</head>
<body>
<div id="banner"><br><br><h1>FakeBook Register Page</h1><br></div>
<div>
<br>
<a href="index.html" id="back"><button>Go back</button></a><br><br></div>
<form method="post" action="register.php">
<br>
<input id="username" name="username" placeholder="Enter here new username" required></input>
<br>
<input id="password" name="password" placeholder="Enter here new password" required></input>
<br>
<input id="password_again" name="password_again" placeholder="Reenter here new password" required></input>
<br>
<input id="security_question" name="security_question" placeholder="Enter here security question" required><lighter>  In case you forget your password</lighter></input>
<br>
<input id="security_answer" name="security_answer" placeholder="Enter here security answer" required><lighter>  Know this to reset your password</lighter></input>
<br>
<input type="submit" id="submit" name="Submit"></input>
<h3 style="color:yellow;text-align:center;">!!!You did not reentered the same password!!!</h3>
</form>
</body>
</html>';


$input_username=$_POST["username"];$input_password=$_POST["password"];$reinput_password=$_POST["password_again"];
$security_question=$_POST["security_question"];$security_answer=$_POST["security_answer"];
if($input_password!=$reinput_password){echo $different_passwords_html;}
else{
$host="localhost";$database="credentials";$user="root";$password="";
$conn=mysqli_connect($host,$user,$password,$database);
$query="select * from credentials1 where Username=? and Password=?;";
$stmt=mysqli_prepare($conn,$query);
mysqli_stmt_bind_param($stmt,"ss",$input_username,$input_password);
mysqli_stmt_execute($stmt);
$result=mysqli_stmt_get_result($stmt);
if(mysqli_num_rows($result)>0){echo $alreadyExists_html;}
else{
$conn2=mysqli_connect($host,$user,$password,$database);
$query2="insert into credentials1 (Username,Password,SecurityQuestion,SecurityAnswer) values (?,?,?,?);";
$stmt2=mysqli_prepare($conn,$query2);
mysqli_stmt_bind_param($stmt2,"ssss",$input_username,$input_password,$security_question,$security_answer);
mysqli_stmt_execute($stmt2);
mysqli_close($conn2);
mysqli_stmt_close($stmt2);
$main=file_get_contents("main.html");
echo $main;
}}
?>