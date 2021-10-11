<?php
include '../classes/adminlogin.php';
?>

<!--  <?php

 $class = new adminlogin();

 // if this form use post method then do
 if($_SERVER['REQUEST_METHOD'] === 'POST'){
 	// Take value of adminUser and adminPass from form after click login
 	$adminUser = $_POST['adminUser'];
 	$adminPass = md5($_POST['adminPass']);

 	$login_check = $class->login_admin($adminUser,$adminPass);	

 }
 ?> -->



<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>SignUp</title>
<style type="text/css">
	.formVal{
		margin-bottom: 10px;
		width: 300px;
		height: 30px;
	}

	.submit{
			width: 100px;
			height: 30px;
	}
</style>
    <link rel="stylesheet" type="text/css" href="../css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		
			<h1>Sign Up</h1>
			<div>
				<input type="text" placeholder="Username" id="name"  name="user" class="formVal" style="margin-bottom: 10px;" />
			</div>
			<div>
				<input type="text" placeholder="Email" id="email" name="email" class="formVal" />
			</div>
			<div>
				<input type="password" placeholder="Password" id="password" name="pass" class="formVal"/>
			</div>

			<div style="position: relative;display: block;">
				<input type="submit" value="Sign Up" style="display: inline-block;text-align: center;" onclick="myfun()" class="submit" />
			</div>
			
			
		
		<div class="button" style="text-align: center;">
		<div><span id="alert" >
				
			</span></div>

			<a href="index.php" style="font-size: 20px;margin: 0;padding: 0;">Sign In</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->

<script >
		function myfun(){
const xhr = new XMLHttpRequest();

// listen for `load` event
xhr.onload = () => {

    // print JSON response
    if (xhr.status >= 200 && xhr.status < 300) {
        // parse JSON
        const response = JSON.parse(xhr.responseText);
        console.log(response);
        document.getElementById("alert").innerHTML = response["status"];
    }
};
 var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
 var password = document.getElementById("password").value;
// create a JSON object


// open request
xhr.open('POST', 'https://genxshopping.herokuapp.com/signup',false);

// set `Content-Type` header
xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8");

// send rquest with JSON payload
xhr.send(JSON.stringify({
	"username":name,
	"email":email,
    "password": password
}));
}
	</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</body>
</html>


 





