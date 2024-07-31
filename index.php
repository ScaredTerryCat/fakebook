<?php
echo'
<!DOCTYPE html>
<html>
<head>
<style>
body{background-color:lightgreen;margin:0px;}
#banner{background-color:black;
margin:0px;
}
#title_of_the_page{
background-color:lightgreen;
display:inline-block;
padding:1%;
margin-left:35%;
border:2px solid white;
border-radius:5px;
}
a{margin-right:10%;
}
button{padding:2%;margin-top:5%;}
img{margin-left:30%;
margin-top:10%;}
</style>
</head>
<body>
<div id="banner">
<br>
<br>
<h1 id="title_of_the_page">Welcome to FakeBook</h1>
<div style="background-color:gray;">
<p style="margin-left:70%;">
<a href="login.html"><button>Login</button></a><a href="register.html"><button>Register</button></a><a href="aboutUs.html"><button>About Us</button></a>
<br><br>
</p>
</div>
</div>
<img src="http://localhost/mandm.jpg" alt="Because of an unknown error, we can\'t display this cool meme, sorry" style="margin-top:0%;margin-left:35%" />
</body>
</html>
';
$host="localhost";
$database="credentials";
$user="root";
$pass="";
$conn1=mysqli_connect($host,$user,$pass);
$query='create database credentials';
mysqli_query($conn1,$query);
$conn2=mysqli_connect($host,$user,$pass,$database);
$query='CREATE TABLE credentials1 (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    SecurityQuestion VARCHAR(255) NOT NULL,
    SecurityAnswer VARCHAR(255) NOT NULL
);
';
mysqli_query($conn2,$query);

?>
