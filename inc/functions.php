<?php
function post($variable, $filter_type){
	if(strtolower($filter_type) == 'int'){
		return trim(filter_input(INPUT_POST, $variable, FILTER_SANITIZE_NUMBER_INT));
	} 
	if(strtolower($filter_type) == 'str'){
		return trim(filter_input(INPUT_POST, $variable, FILTER_SANITIZE_STRING));
	}

}
function redirect($page){
	return header("location: " . $page);
}
function imageExists($targetPath){
	include('connection.php');
	try{
		$query = "SELECT image FROM images WHERE image = ?";
		$result = $db->prepare($query);
		$result->bindParam(1, $targetPath, PDO::PARAM_STR);
		$result->execute();
		return $result->fetch(PDO::FETCH_ASSOC);
	} catch(Exception $e){
		echo $e->getMessage();
	}
}
function addImage($image, $caption){
	include("connection.php");
	try{
		$query = "INSERT INTO images(image, caption) VALUES (? , ?)";
		$result = $db->prepare($query);
		$result->bindParam(1, $image, PDO::PARAM_STR);
		$result->bindParam(2, $caption, PDO::PARAM_STR);
		$result->execute();
		return true;
	} catch(Exception $e){
		echo $e->getMessage();
		return false;
	}
}
function getImages(){
	include("connection.php");
	try{
		$query = "SELECT * FROM images";
		$result = $db->prepare($query);
		$result->execute();
		return $result->fetchAll();
	} catch(Exception $e){
		echo $e->getMessage();
	}
}

function displayImagesInTable($image){
	echo "<tr>";
	echo "<td class='col-xs-8'>$image[caption]</td>";
	echo "<td class='col-xs-3'><img style='width:50px;'src='$image[image]'></td>";
	echo "<td class='col-xs-1'>";
	echo "<form class='deleteButtonForm btn' action='add_pic.php' method='post'>";
	echo "<input type='hidden' name='imgToDelete' value='";
	echo $image['picture_id'];
	echo "'/>";
	echo "<input type='hidden' name='imgsize' value='";
	echo filesize($image['image']);
	echo "'/>";
	
	echo "<input  type='submit' name='submit' value='Delete'/>";
	echo "</form></td>";
	echo "</tr>";
}

function deleteImageFromDB($picture_id){
	include("connection.php");
	try{
		$sql = "DELETE FROM images WHERE picture_id = ?";
		$result = $db->prepare($sql);
		$result->bindParam(1, $picture_id, PDO::PARAM_INT);
		$result->execute();
		return true;
	} catch(Exception $e){
		echo $e->getMessage();
		return false;
	}
}
function getImageFile($picture_id){
	include("connection.php");
	try{
		$sql = "SELECT image FROM images WHERE picture_id = ?";
		$result = $db->prepare($sql);
		$result->bindParam(1,$picture_id, PDO::PARAM_INT);
		$result->execute();
		return $result->fetch();
	} catch(Exception $e){
		echo $e->getMessage();
		return false;
	}
}
function deleteFromFolder(){
}
function userSignup($userName, $password, $firstName, $lastName){
	include("connection.php");
	try{
		$userQuery = "SELECT user_name FROM users_table WHERE user_name = ?";
		$result = $db->prepare($userQuery);
		$result->bindParam(1, $userName, PDO::PARAM_STR);
		$result->execute();
		if(!$result->rowCount()){
			$password = password_hash($password, PASSWORD_BCRYPT);

			$insertQuery = "INSERT INTO users_table(user_name, password, first_name, last_name) VALUES (?, ?, ?, ?)";

			
			$result2 = $db->prepare($insertQuery);
			$result2->bindParam(1, $userName, PDO::PARAM_STR);
			$result2->bindParam(2, $password, PDO::PARAM_STR);
			$result2->bindParam(3, $firstName, PDO::PARAM_STR);
			$result2->bindParam(4, $lastName, PDO::PARAM_STR);
			$result2->execute();

			// $newId = $db->lastInsertId();
			// $_SESSION['user_id'] = $newId;
			
			return true;
		} else {
			

			return false;
		}
	} catch(Exception $e){
		echo $e->getMessage();
		return false;
	}
}

function userLogin($username, $password){
	include("connection.php");
	try{
		$checkUser = ("SELECT * FROM users_table WHERE user_name = ?");
		
		$result = $db->prepare($checkUser);
		$result->bindParam(1, $username, PDO::PARAM_STR);
		
		$result->execute();
		
		if($result->rowCount()>0){
			
			$row = $result->fetch(PDO::FETCH_ASSOC);
			
						
			if(password_verify($password, $row['password'])){
				$_SESSION['user_id'] = $row['user_id'];
				return true;
				
			} else{
				
				return false;
			}
		} else{
			
			return false;
		}
		
	} catch(Exception $e){
		echo $e->getMessage();
		return false;
	}
}



function getCurrentUser(){
	include("inc/connection.php");
	$sessionId = $_SESSION["user_id"];
	try{
		$sql = "SELECT first_name, last_name FROM users_table WHERE user_id = ?";
		$results=$db->prepare($sql);
		$results->bindParam(1, $sessionId, PDO::PARAM_STR);
		$results->execute();
		$row = $results->fetch(PDO::FETCH_ASSOC);
		return $row['first_name'] . " " . $row["last_name"];
	} catch (Exception $e){
		echo $e->getMessage();
		return false;
	}
}



function addCategory($category){
	include("connection.php");
	try{

		$sql = 'INSERT INTO Service_Category(CategoryName) VALUES (?)';

		$results = $db->prepare($sql);
		$results->bindParam(1, $category, PDO::PARAM_STR);
		$results->execute();
		return true;
	} catch (Exception $e){
		echo "Error!: " . $e->getMessage() . "<br />";
		return false;
	
	}
}
function getCategories(){
	include("connection.php");
	$sql = "SELECT category_id, CategoryName FROM Service_Category ORDER BY category_id";
	try{
		$results = $db->prepare($sql);
		$results->execute();
		return $results->fetchAll();
	} catch(Exception $e){
		echo "Error!:" . $e->getMessage() . "<br />";
		return false;
	}
	
}
function editService($service_name, $service_price, $service_id){
	include("connection.php");
	try{
		$sql=("UPDATE Services SET service_name= ?, service_price = ? WHERE service_id = ? ");
		$result=$db->prepare($sql);
		$result->bindParam(1, $service_name, PDO::PARAM_STR);
		$result->bindParam(2, $service_price, PDO::PARAM_STR);
		$result->bindParam(3, $service_id, PDO::PARAM_INT);
		$result->execute();
		return true;
	} catch(Exception $e){
		echo $e->getMessage();
		return false;
	}
}
function addService($category_id, $serviceName, $servicePrice){
		include("connection.php");
	
		try{
			$sql=('INSERT INTO Services(category_id, service_name, service_price) VALUES (?, ?, ?)');
			$results = $db->prepare($sql);
			$results->bindParam(1, $category_id, PDO::PARAM_INT);
			$results->bindParam(2, $serviceName, PDO::PARAM_STR);
			$results->bindParam(3, $servicePrice, PDO::PARAM_STR);
			$results->execute();
			return true;
		} catch(Exception $e){

				 $e->getMessage();

			return false;
		}
		
	
}


function getServices(){
	include("connection.php");
	$sql=("SELECT Services.*, CategoryName FROM Services
	JOIN Service_Category ON Services.category_id = Service_Category.category_id
	ORDER BY Services.category_id, Services.service_id");
	try{
		$results = $db->prepare($sql);
		$results->execute();
		return $results->fetchAll();
	} catch(Exception $e){
		echo $e->getMessage();
	}
}

function displayServiceCategory($service){
						echo "<thead>";
						echo "<tr>";
						echo "<th class='col-xs-8'>".$service['CategoryName']."</th>";
						echo "<th class='col-xs-3 '>Price</th>";
						echo "<th class='col-xs-1'></th>";
						echo "</tr>";
						echo "</thead>";
}


function displayServices($service){
					echo "<tr class='edit' >";
					echo "<td >";
					echo "<div contenteditable='true' id='editName' class='price' >" .$service["service_name"] . "</div>";
					echo "</td>";
					echo "<td >";
					echo "<div contenteditable='true' id='editPrice' class='price' >";	
					echo $service["service_price"];
					echo"</div>";
					echo "</td>";
					echo "<td >";
					echo "<form class='deleteButtonForm btn ' method='post' >";
					echo "<input  type='hidden' name='nameToEdit' value='";
					echo $service["service_name"];
					echo "'>";
					echo "<input  type='hidden' name='priceToEdit' value='";
					echo $service["service_price"];
					echo "'>";
					
					echo "<input type='hidden' name='serviceId' value='" . $service['service_id']."'/>";
					echo "<input  type='submit' name='submit' value='Delete' />";
					echo "<input class='editCancel' style='display:none' type='submit' name='submit' value='Save' />";	
					echo "<input class='editCancel' style='display:none' type='button'  value='Cancel' />";
					echo "</form>";
					echo "</td>";
					echo "</tr>";
}



function deleteService($serviceId){
	include("connection.php");
	try{
		$sql = "DELETE FROM Services WHERE service_id = ?";
		$result = $db->prepare($sql);
		$result->bindParam(1, $serviceId, PDO::PARAM_INT);
		$result->execute();
		return true;
	} catch(Exception $e){
		echo $e->getMessage();
		return false;
	}
}

function flashMessage(){
	
	if(isset($_SESSION['notLog'])){
			$message = $_SESSION['notLog'];
			echo "<div class='alert alert-danger alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>$message</div>";
		unset($_SESSION['notLog']);
	}
	if(isset($_SESSION['logout'])){
								$message = $_SESSION['logout'];
								echo "<div class='alert alert-success alert-dismissable'>
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								$message</div>";
								unset($_SESSION['logout']);
							
	}
	if(isset($_SESSION['error'])){
			foreach($_SESSION['error'] as $message){
				echo "<div class='alert alert-danger alert-dismissable '>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				$message</div>";
				
			}
			unset($_SESSION['error']);
	}
	if(isset($_SESSION['success'])){
			
			$success = $_SESSION['success'];
				echo "<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				$success</div>";
				
			unset($_SESSION['success']);
	}
}


function notLogged(){
		if(!isset($_SESSION['user_id'])){
			$_SESSION['notLog'] = "You do not have permission to view this page.  Please log in.";
		redirect('admin_login.php');
		exit;
	}

}

function displayCarouselImages($image){

	echo "<div class='carCont'>";
              echo "<a href='$image[image]' data-lightbox='1' data-title='";
              echo $image['caption'];
              echo "'>";
              echo "<div class='carDiv' style=\"background-image:url('$image[image]')\";></div></a>"; 
              echo "</div>";

}






