<?php
include '../classes/adminlogin.php';
?>


<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>SignIn</title>
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
		
			<h1>Sign In</h1>
			<div>
				<input type="text" placeholder="Username" id="name"  name="user" class="formVal" style="margin-bottom: 10px;" />
			</div>
			<div>
				<input type="password" placeholder="Password" id="password"  name="password" class="formVal" style="margin-bottom: 10px;" />
			</div>
			
			<div style="position: relative;display: block;">
				<input type="submit" value="Sign In" style="display: inline-block;text-align: center;" onclick="myfun()" class="submit" />
			</div>
			
			
		
		<div class="button">
		<div><span id="alert" >
				
			</span></div>

			<a href="signup.php" style="font-size: 20px;margin: 0;padding: 0;">Sign Up</a>
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
        if(response["status"] == "success"){
        	
        	window.location="home.php";
        }
    }
};
 var name = document.getElementById("name").value;
 var password = document.getElementById("password").value;
// create a JSON object


// open request
xhr.open('POST', 'https://genxshopping.herokuapp.com/signin',false);

// set `Content-Type` header
xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8");

// send rquest with JSON payload
xhr.send(JSON.stringify({
	"username":name,
    "password": password
}));
}




	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

</body>
</html>








