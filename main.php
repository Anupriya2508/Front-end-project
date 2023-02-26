<?php
$mysqlserverhost = "localhost";
$database_name = "eunimart";
$username_mysql = "root";
$password_mysql = "";

function sanitize($variable){
	$clean_variable = strip_tags($variable);
	$clean_variable = htmlentities($clean_variable, ENT_QUOTES, 'UTF-8');
	return $clean_variable;
}

function connect_to_mysqli($mysqlserverhost, $username_mysql, $password_mysql, $database_name){
	$connect = mysqli_connect($mysqlserverhost, $username_mysql, $password_mysql, $database_name);
	if (!$connect) {
		  die("Connection failed mysql: " . mysqli_connect_error());
	}
	return $connect;	
}

if(isset($_POST["processform"])){
	$connection = connect_to_mysqli($mysqlserverhost, $username_mysql, $password_mysql, $database_name);
    
	$name = mysqli_real_escape_string($connection, sanitize($_POST["name"]));
    
	$phno = mysqli_real_escape_string($connection, sanitize($_POST["phno"]));
    
	$email = mysqli_real_escape_string($connection, sanitize($_POST["email"]));
    

    
	$sql = "INSERT INTO forms (name, phone_number, email) VALUES ('$name', '$phno', '$email')";
    
    if (mysqli_query($connection, $sql)) {
		  echo "";
          header("Location: second.php");
          
	} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
	}
	mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title>

	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
    <body>

	<link rel="icon" type="image/png" href="./images/icons/favicon.ico"/>
        
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<!--Custom JavaScript Alert Box-->

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form action="main.php" method="post" class="login100-form validate-form" >
                <input type="hidden" name="processform" value="1">
					<span class="login100-form-title p-b-49">
						Form
					</span>
                    
                     <input type="hidden" name="form" value="1">
                    
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is required">
						<span class="label-input100">Name</span>
						<input  id="name" class="input100" type="text" name="name" placeholder="Enter your name" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Phone number is required">
						<span class="label-input100">Phone Number</span>
						<input id="pno" class="input100" type="tel" pattern="^\d{10}$" required  name="phno" placeholder="Enter your phone number">
						<span class="focus-input100" data-symbol="&#xf095;"></span>
					</div>
                    <br>
                    
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Email</span>
						<input id="email" class="input100" type="email" name="email" placeholder="Enter your email" required>
						<span class="focus-input100" data-symbol="&#9993;"></span>
					</div>
					<br>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
                              <a href="second.html"> 
							<button class="login100-form-btn" type="submit" value="submit" id="submit">
								<b>Submit</b>
							</button>
                            </a>
						</div>
					</div>
                </form>
            </div></div></div>

<script>
const username = document.getElementById('name');
const pno = document.getElementById('pno');
const email = document.getElementById('email');


form.addEventListener('submit', e => {
  e.preventDefault();
  checkInputs();
});

function checkInputs() {
  // trim to remove the whitespaces
  const usernameValue = username.value.trim();
  const passwordValue = phno.value.trim();
  const emailValue = email.value.trim();
 

  if (usernameValue === '') {
    setErrorFor(username, 'Username cannot be blank');
  } else {
    setSuccessFor(username);
  }

    if (pno === '') {
    setErrorFor(pno, 'Pnone number cannot be blank');
  } else {
    setSuccessFor(pno);
  }

    
  if (email === '') {
    setErrorFor(email, 'Email cannot be blank');
  } else if (!isEmail(email)) {
    setErrorFor(email, 'Not a valid email');
  } else {
    setSuccessFor(email);
  }

  

function setErrorFor(input, message) {
  const formControl = input.parentElement;
  const small = formControl.querySelector('small');
  formControl.className = 'form-control error';
  small.innerText = message;
}

function setSuccessFor(input) {
  const formControl = input.parentElement;
  formControl.className = 'form-control success';
}

function isEmail(email) {
  return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
    email
  );
}
</script>
	<script src="js/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>