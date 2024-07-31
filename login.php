<?php
$successful_html=file_get_contents("main.html");
$unsuccesful_html='
<!DOCTYPE html>
<html>
<head>
<title>
FakeBook login Page
</title>
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
input{margin-left:35%;
margin-top:3%;
margin-bottom:2%;
padding:2%;
border:2px solid black;
border-radius:20px;
}
#submit{margin-left:65%;padding:2%;padding-right:3%;padding-left:3%;border:2px solid black;background-color:yellow;;
border-radius:0px;
}
#washidden{margin:0px;margin-left:20%;font-size:15px;
padding-left:1%;
padding-right:1%;
margin-right:20%;
}
#link{margin-left:10%;margin-right:10%;color:lightblue;}
#username{margin-bottom:6%;margin-top:6%;}
#makeBig{display:inline-block;color:yellow;margin:0px;margin-left:10%;}
</style>
</head>
<body>
<div id="banner"><br><br><h1>FakeBook Login Page</h1><br></div>
<div>
<br>
<a href="index.html" id="back"><button>Go back</button></a><br><br></div>
<form method="post" action="login.php">
<br>
<input id="username" name="username" placeholder="enter here the username"></input>
<br>
<input id="password" name="password" placeholder="enter here the password"></input>
<br>
<input type="submit" id="submit" name="Submit"></input>
<p id="washidden"><h3 id="makeBig">!!!Entered credentials are not valid!!!<h3><br><a href="forgot_credentials.html" id="link">Click this link if you forgot your credentials</p>
<br>
</form>
</body>
</html>
';


$input_username=$_POST["username"];
$input_password=$_POST["password"];
$host="localhost";$user="root";$password="";$database="credentials";
$conn=mysqli_connect($host,$user,$password,$database);
$query="SELECT * FROM credentials1 WHERE Username=? AND Password=?;";
$configuring_query=mysqli_prepare($conn,$query);
mysqli_stmt_bind_param($configuring_query,"ss",$input_username,$input_password);
mysqli_stmt_execute($configuring_query);
$result=mysqli_stmt_get_result($configuring_query);
if(mysqli_num_rows($result)>0){echo $successful_html;}
else{echo $unsuccesful_html;}
?>