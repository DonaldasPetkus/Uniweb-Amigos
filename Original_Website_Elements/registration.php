<?php
session_start();
if (isset($_SESSION['userSession'])!="") {
 header("Location: home.php");
}
require_once 'dbconnect.php';//connects you to the database

if(isset($_POST['btn-signup'])) {
 
 $uname = strip_tags($_POST['username']);
 $email = strip_tags($_POST['email']);
 $upass = strip_tags($_POST['password']);
 $role = strip_tags($_POST['role']);
 $fac = strip_tags($_POST['faculty']);
 
 $uname = $dbcon->real_escape_string($uname);
 $email = $dbcon->real_escape_string($email);
 $upass = $dbcon->real_escape_string($upass);
 $role = $dbcon->real_escape_string($role);
 $fac = $dbcon->real_escape_string($fac);
 $hashed_password = password_hash($upass, PASSWORD_DEFAULT);

 if ($count==0) {
  
  $query = "INSERT INTO user(username,email,password,role,faculty) VALUES('$uname','$email','$hashed_password','$role','$fac')";// this inserts what has been entered into the form inot the database allowing you to log in correctly


  if ($dbcon->query($query)) {//this checks my query from my database before continuing
   $msg = "<div class='alert alert-success'>
      <span></span> &nbsp; successfully registered !
     </div>";// this displays if you have successfully registered
  }
  else {
   $msg = "<div class='alert alert-danger'>
      <span></span> &nbsp; error while registering !
     </div>";// this displays if there is a error while messaging
  }
  
 } 
 else {
  
  
  $msg = "<div class='alert alert-danger'>
     <span></span> &nbsp; sorry email already taken !
    </div>";// this checks the database to see whether the email you are entering with is new if not displays this
   
 }
 $dbcon->close();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Registration</title>
	<link rel="stylesheet" type="text/css" href="Template.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container" id="admin">
<h1>Admin Registration</h1>

<div>
        
       <form class="form-signin" method="post" id="register-form">
        <div>
        Username:<br>
        <input type="text" class="form-control" placeholder="Username" name="username" required  />
           </div>
        <div>
        Email:<br>
        <input type="email" class="form-control" placeholder="Email" name="email" required  />
        </div>
        <div>
        Role:<br>
        <input type="text" class="form-control" placeholder="role" name="role" required  />
        </div>
        <div>
        Faculty<br>
        <input type="text" class="form-control" placeholder="faculty" name="faculty" required  />
        </div>
        <div>
        Password:<br>
        <input type="password" class="form-control" placeholder="Password" name="password" required  />

              <button type="submit" class="btn btn-default" name="btn-signup">&nbsp; Create Account</button></div>
</form></div>
</body>
</html>