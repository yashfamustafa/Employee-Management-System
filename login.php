<?php

session_start();

if(isset($_SESSION['username']))
{
    header("Location: index.php");
    exit();
}

?>



<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Employee Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial, Helvetica, sans-serif;
}

body{

height:100vh;

display:flex;

justify-content:center;

align-items:center;

background:linear-gradient(135deg,#0d6efd,#5fa8ff);

}

.login-container{

width:1000px;

height:600px;

display:flex;

background:white;

border-radius:20px;

overflow:hidden;

box-shadow:0 20px 50px rgba(0,0,0,.25);

}

/* Left Side */

.left-panel{

flex:1;

background:linear-gradient(135deg,#0d6efd,#4d95ff);

color:white;

display:flex;

flex-direction:column;

justify-content:center;

align-items:center;

padding:50px;

text-align:center;

}

.left-panel i{

font-size:90px;

margin-bottom:25px;

}

.left-panel h1{

font-size:38px;

margin-bottom:20px;

font-weight:bold;

}

.left-panel p{

font-size:17px;

line-height:1.8;

opacity:.95;

}

/* Right Side */

.right-panel{

flex:1;

display:flex;

justify-content:center;

align-items:center;

padding:40px;

}

.login-box{

width:100%;

max-width:360px;

}

.login-box h2{

text-align:center;

color:#0d6efd;

font-weight:bold;

margin-bottom:10px;

}

.login-box p{

text-align:center;

color:#6c757d;

margin-bottom:35px;

}

.input-group{

margin-bottom:20px;

}

.input-group-text{

background:#0d6efd;

color:white;

border:none;

}

.form-control{

height:48px;

}

.form-control:focus{

box-shadow:none;

border-color:#0d6efd;

}

.btn-login{

width:100%;

height:48px;

font-weight:bold;

font-size:17px;

border-radius:8px;

}

.btn-login:hover{

transform:translateY(-2px);

}

.footer{

margin-top:20px;

text-align:center;

color:#6c757d;

font-size:14px;

}

@media(max-width:900px){

.login-container{

flex-direction:column;

width:95%;

height:auto;

}

.left-panel{

padding:40px;

}

}

</style>

</head>

<body>

<div class="login-container">

<div class="left-panel">

<i class="fa-solid fa-users"></i>

<h1>Employee Management System</h1>

<p>

Manage employees securely,

efficiently,

and professionally using your own

Employee Management Dashboard.

</p>

</div>

<div class="right-panel">

<div class="login-box">

<h2>Welcome Back</h2>

<p>Login to continue</p>

<form action="loginProcess.php" method="POST">

<div class="input-group">

<span class="input-group-text">

<i class="fa-solid fa-user"></i>

</span>

<input
type="text"
name="username"
class="form-control"
placeholder="Username"
required>

</div>

<div class="input-group">

<span class="input-group-text">

<i class="fa-solid fa-lock"></i>

</span>

<input
type="password"
name="password"
class="form-control"
placeholder="Password"
required>

</div>

<button
type="submit"
class="btn btn-primary btn-login">

<i class="fa-solid fa-right-to-bracket"></i>

Login

</button>

</form>

<div class="footer">

© 2026 Employee Management System

</div>

</div>

</div>

</div>

</body>

</html>