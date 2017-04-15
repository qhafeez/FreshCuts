<?php
	session_start();
	include("inc/connection.php");
	include("inc/functions.php");
	
	notLogged();
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if($_POST['submit']=='Add User'){
		$firstName = post('firstNameSign', "STR");
		$lastName =  post('lastNameSign', "STR");
		$username =  post('username', "STR");
		$password =  post('signUpPass', "STR");
		// var_dump($firstName);
		
		if(!empty($firstName) && !empty($lastName) && !empty($username) && !empty($password)){
				if(userSignup($username, $password, $firstName, $lastName)){
					$_SESSION['success'] = "User $username has been signed up";
					redirect("add_user.php");
					exit;
				} else {
					$_SESSION['error'][]= "That username already exists";
					redirect("add_user.php");
					exit;
				}
		
		} else {
			if(empty($firstName)){
				$_SESSION['error'][] = "You must enter a first name";
			}
			if(empty($lastName)){
				$_SESSION['error'][] = "You must enter a last name";
			}
			if(empty($username)){
				$_SESSION['error'][] = "You must enter a username";
			}
			if(empty($password)){
				$_SESSION['error'][] = "You must enter a password";
			}
			redirect("add_user.php");
			exit;
		}
	}
}
		include("inc/header.php");
?>

	


<div id="signUp" class="form col-xs-12 col-sm-8 col-sm-offset-2">
	<h2 class="admin text-center">Fresh Cuts Admin</h2>
	<h2 class="text-center">Sign Up New User</h2>
	<form  class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3" action="add_user.php"  method="post">


					<?php 
						flashMessage();
					?>
		
		<div class="form-group">

			<label>First Name</label>
			<input class="form-control" id="firstNameSign" name="firstNameSign" type="text" placeholder="First Name" />
		</div>

		
		<div class="form-group">
			<label>Last Name</label>
			<input class="form-control" id="lastNameSign" name="lastNameSign" type="text" placeholder="Last Name" />
		</div>

		<div class="form-group">
			<label>Username</label>
			<input class="form-control" id="userNameSign" name="username" type="text" placeholder="Username" />
		</div>

		<div class=" signUpPassField form-group">
			<label>Password</label>
			<input class="form-control" id="signUpPass"  name="signUpPass" type="password" placeholder="Password"><span>Password Must Be Longer Than 8 Characters</span>
		</div>

		<div class="form-group">
			<label>Confirm Password</label>
			<input class="form-control" id="confPass" name="confPass" type="password" placeholder="Confirm Password"/><span>Password Must Match</span>
		</div>

		<div class="form-group">
			<input class="  form-control" type="submit" name="submit" value="Add User" />
		</div>
		
		

	</form>
	
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="signUpForm.js"></script>



</body>
	</html>
