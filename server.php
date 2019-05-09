<?php
session_start();

// variable declaration
$username = "";
$email    = "";
$fullname = "";
$phonenumber = "";
$aim      = "";
$bodytype = "";
$age      = "";
$height   = "";
$weight   = "";
$errors = array(); 
// connect to the database
$db = mysqli_connect('localhost','root','', 'db_gym1');
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = $_POST['username'];
  $email = $_POST['email'];
  $fullname = $_POST['fullname'];
  $phonenumber = $_POST['phonenumber'];
  $aim = $_POST['aim'];
  $bodytype = $_POST['bodytype'];
  $age = $_POST['age'];
  $height = $_POST['height'];
  $weight = $_POST['weight'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($fullname)) { array_push($errors, "Full name is required"); }
  if (empty($phonenumber)) { array_push($errors, "Phone number is required"); }
  if (empty($aim)) { array_push($errors, "Aim is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM clients WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
  
    // Checking length of the password
	if(strlen($password_1) >=4) {
	} else {
		array_push($errors, "Password must be no shorter than 4 symbols");
	}

	// Checking for @ and . in email
	if(strstr($email, '@')and strstr($email, '.') ) {
	} else {
		array_push($errors, "Email must contain @ and .");
	}

	
	// Checking age to be integer
	if ((int)$age) {
	} else {
		array_push($errors, "Age must be integer");
	}
  
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
	
  	$query = "INSERT INTO clients (username, password, fullname, email, phonenumber, aim, bodytype, age, height, weight) 
  			  VALUES('$username', '$password', '$fullname', '$email', '$phonenumber', '$aim', '$bodytype', '$age', '$height', '$weight')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: homepage.php');
  }

}

// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM clients WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: homepage.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>
