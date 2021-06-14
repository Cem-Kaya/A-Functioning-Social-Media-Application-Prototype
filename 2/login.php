<!DOCTYPE html>
<html>
<head>
	<title>User Login And Registration</title>
	<link rel="stylesheet" type= "text/css" href = "style.css">
	<link rel="stylesheet" type= "text/css" href = "https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head> 
<body>

<div class = "login_title" >  Social Media for Men of Culture </div>



<div class = "container">
	<div class = "login-box">
	<div class= "row">
	<div class= "col-md-6 login-left">
		<h2> Login Here </h2>
		<form action = "validation.php" method = "POST">
			<div class = "form-group">
				<label>Email</label>
				<input type= "text" name="email" class="form-control" required>
			</div>
			<div class ="form-group">
				<label>Password</label>
				<input type= "password" name="password" class="form-control" required>
			</div>
			<button type = "submit" class ="btn btn-primary">Login </button>
		</form>
	</div>

	<div class= "col-md-6 login-right">
		<h2> Register Here </h2>
		<form action = "registration.php" method = "POST">
			<div class = "form-group">
				<label>Username</label>
				<input type= "text" name="username" class="form-control" required>
			</div>
			<div class = "form-group">
				<label>Email</label>
				<input type= "text" name="email" class="form-control" required>
			</div>
			<div class ="form-group">
				<label>Password</label>
				<input type= "password" name="password" class="form-control" required>
			</div>
			<div class ="form-group">
				<label>Info</label>
				<input type= "text" name="info" class="form-control">
			</div>
			<div class ="form-group">
				<label>Picture_URL</label>
				<input type= "text" name="Picture_URL" class="form-control">
			</div>
			<button type = "submit" class ="btn btn-primary">Register </button>
			
		</form>
	</div>
   
	</div>

	</div>
</div>
</body>
</html>