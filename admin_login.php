<?php
	session_start();
	include("inc/connection.php");
	include("inc/functions.php");
	if(!empty($_GET['msg'])){
		$error = $_GET['msg'];
	}
	if(!empty($_GET['logout'])){
		if($_GET['logout']==1 && !empty($_SESSION['user_id'])){

			session_destroy();
			$_SESSION['logout']="You have been successfully logged out";
		}
	} 
		
	
	if(empty($_GET['logout'])  && !empty($_SESSION['user_id'])){
		redirect("add_service.php");
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		
		if($_POST['submit'] == "Log In"){
		
		$usernameExisting = post('usernameExisting', "str");
		$passwordExisting = post('passwordExisting', "str");


		if(!empty($usernameExisting) && !empty($passwordExisting)){
			if(userLogin($usernameExisting, $passwordExisting)){
				//sets $_SESSION['user_id'] to user_id of the logged in user

				unset($_SESSION['username']);
				redirect("add_service.php");
				exit;
			} else{
				

				$_SESSION['error'][] = "Username and Password do not match our records";
				redirect("admin_login.php");
				exit;
			}
		} else if (empty($usernameExisting)){
			$_SESSION['error'][] = "Please enter a username";
			if(empty($passwordExisting)){

				$_SESSION['username'] = $usernameExisting; //keeps username in input field so they don't have to type it again

				$_SESSION['error'][]="Please enter a password";
			
			redirect('admin_login.php');
			exit;
		
		}
	}

	}
}

	
?>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Oleo+Script|Oleo+Script+Swash+Caps|Petit+Formal+Script" rel="stylesheet">
  	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="logIn" class="form col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
	<h2 class="admin text-center">Fresh Cuts Admin</h2>
	

	<form  class="  col-sm-8 col-sm-offset-2" action="admin_login.php"  method="post">
		<?php 
			
			flashMessage();				
		?>

		<div class="form-group">
			<label>Username</label>

			<input class="form-control" name="usernameExisting" type="text" placeholder="usernameExisting" value= "<?php if (isset($_SESSION['username'])){ echo $_SESSION['username'];} ?>" />

		</div>
		
		<div class="form-group">
			<label class="control-label">Password</label>
			<input class="form-control" name="passwordExisting" type="password" placeholder="passwordExisting"/>
			
		</div>
		<div class="form-group">
			

			<input class=" form-control" name='submit' type="submit" value="Log In" />

		</div>
		
		
	</form>
	
</div>
		
		

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script>


$(window).on('load resize', function(){
	var height = $(window).width();
	console.log("height");
	$("#logIn").css("margin-top", (height * .15)+"px");
});
	</script>
</body>
</html>