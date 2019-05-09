<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Gym Registration System</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Welcome to Fitness Palace!</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username*</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email*</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
	<div class="input-group">
  	  <label>Full name*</label>
  	  <input type="text" name="fullname" value="<?php echo $fullname; ?>">
  	</div>
	<div class="input-group">
  	  <label>Phone number*</label>
  	  <input type="text" name="phonenumber" value="<?php echo $phonenumber; ?>">
  	</div>
	<div class="input-group">
  	  <label>Aim*</label>
  	  <input type="text" name="aim" value="<?php echo $aim; ?>">
  	</div>
	<div class="input-group">
  	  <label>Body type</label>
  	  <input type="text" name="bodytype" value="<?php echo $bodytype; ?>">
  	</div>
	<div class="input-group">
  	  <label>Age</label>
  	  <input type="text" name="age" value="<?php echo $age; ?>">
  	</div>
	<div class="input-group">
  	  <label>Height</label>
  	  <input type="text" name="height" value="<?php echo $height; ?>">
  	</div>
	<div class="input-group">
  	  <label>Weight</label>
  	  <input type="text" name="weight" value="<?php echo $weight; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password*</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password*</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>Required fields*<br><br>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
