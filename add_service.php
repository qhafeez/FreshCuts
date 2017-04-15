<?php
session_start();

include('inc/connection.php');
include('inc/functions.php');
notLogged();

$currentUser = getCurrentUser();
if($_SERVER["REQUEST_METHOD"]=="POST"){
	
	
	
	
	
//add service
if($_POST['submit']=='Add Service'){
	$category_id = post('category_id', "INT");
	$serviceName = post('serviceName', "STR");
	$servicePrice = post('servicePrice', "STR");
	if(!empty($category_id) && !empty($serviceName) && !empty($servicePrice)){
		if(addService($category_id, $serviceName, $servicePrice)){
			$_SESSION['success'] = "Service has been added";
			redirect('add_service.php');
			exit;
		} else{

			$_SESSION['error'][]= "That service already exists";
			 redirect('add_service.php');

			exit;
		}
	} else {
			if(empty($category_id)){
				$_SESSION['error'][]="You must choose a category_id";
			}
			if(empty($serviceName)){
				$_SESSION['error'][]="You must enter a name for the service";
			}
			if(empty($servicePrice)){
				$_SESSION['error'][]="You must enter a price";
			}
			redirect('add_service.php');
			exit;
		}
	}
	//edit price
	if($_POST['submit'] == 'Save'){
		$serviceNameToEdit = post('nameToEdit', 'STR');
		$servicePriceToEdit = post('priceToEdit', 'STR');
		$serviceId = post('serviceId', 'INT');
		if(!empty($servicePriceToEdit)){
			if(editService($serviceNameToEdit, $servicePriceToEdit, $serviceId)){
				$_SESSION['success'] = "Service Edited Successfully";
				redirect("add_service.php");
				exit;
			}
		} else {
			redirect("add_service.php");
		}
	}
	//delete Service
	if($_POST['submit']=="Delete"){
		$taskToDelete = post('serviceId', "INT");
		if(!empty($taskToDelete)){
			if(deleteService($taskToDelete)){
				$_SESSION['success'] = "Service deleted successfully";
				redirect('add_service.php');
				exit;
			} else{
				$error[] = "Could not delete";
				redirect('add_service.php');
				exit;
			}
		}
	}
//add Category
if($_POST['submit']=='Add Category'){
	$newCategory = post('category', "STR");
	if(!empty($newCategory)){
		if(addCategory($newCategory)){
			
			$_SESSION['success'] = "Category successfully added";
		} else {
			$_SESSION['error'][] = "There was an issue adding this category";
		}
		redirect('add_service.php');
		exit;
	} else {
			$_SESSION['error'][] =  "Please Type something in the category box";
			redirect('add_service.php');
			exit;
		}
	}
}
include("inc/header.php");
?>
  
	<div class="container ">
		
		
		<div class="row text-center welcome">
			<h2>Welcome, <?php echo $currentUser ?></h2>
		</div>
		<div class="row container">
			
			
			<input class="col-xs-12 col-sm-4 col-sm-offset-2 " type='button' role="button" data-toggle="modal" data-target="#addCategoryModal" value='Add Category'/>
		
			<input class="col-xs-12 col-sm-4" type="button" role="button" data-toggle="modal" data-target="#addServiceModal" value='Add Service' />
		</div>
	
		
	
	
	<div class=" fullServiceList col-xs-12 col-sm-8 col-sm-offset-2">
		<?php 

						flashMessage();

					?>
		
		<h1 class="text-center">Full Service List</h1>
		<p class="text-center">Tap/click Service Name or Price to edit</h3>
		<table >
		<?php 
			$category_id=0;
			if(count(getServices())>0){
			foreach(getServices() as $service){
				
					if($category_id != $service['category_id']){
						$category_id = $service['category_id'];

						
						displayServiceCategory($service);
					}
					
					displayServices($service);

					
				 
			}
		} else {

			echo "<h3 class='text-center'>No services have been added! Add some!</h3>";
		}
		?>
	</table>
	</div>

</div>

<!-- Modal -->
  <div class="modal fade" id="addCategoryModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Add A New Category</h4>
        </div>
        <div class="modal-body row">
        	<form class=" col-xs-12 col-sm-8 col-sm-offset-2" action="add_service.php" method="post">
        		<div class="form-group">
					<input class="form-control col-xs-12" type="text" name="category" placeholder="Add New Category" / >
				</div>
				<div class="form-group">
					<input class="form-control btn" name="submit" type="submit" value="Add Category" / >
				</div>
			</form>
          
        </div>
        
      </div>
      
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="addServiceModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Add A New Service</h4>
        </div>
        <div class="modal-body row">
        	<form id="serviceForm_input_form" class="col-xs-12 col-sm-8 col-sm-offset-2" action="add_service.php" method="post">
				<select class="col-xs-12 " name="category_id" id="category_id">
					<option>Select Category</option>
					<?php
						foreach(getCategories() as $item){
							echo "<option value='";
							
							echo $item['category_id'];
							echo "'>";
							echo $item['CategoryName'];
							echo "</option>";
						}
					?>
				</select>
				<div class="form-group">
					<input class="form-control col-xs-12 " type="text" name="serviceName" placeholder="Service Name" />
				</div>
				<div class="form-group">
					<input class="form-control col-xs-12 " type="text" name="servicePrice" placeholder="Price" />
				</div>
				<div class="form-group">
					<input class="form-control col-xs-12 btn" name="submit" type="submit" value="Add Service" />
				</div>
			</form>
          
        </div>
        
      </div>
      
    </div>
  </div>
  <?php var_dump($_SESSION) ?>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
    	$(window).bind("pageshow", function(event) {
   			 if (event.originalEvent.persisted) {
       				 window.location.reload() 
    			}
		});
    	
    	$(".price").on("click", function(){
    		// $(this).parents("tr").find(" input[value=Edit]").show();
    		$(this).parents("tr").find(".editCancel").show();
    		$(this).parents("tr").find(" input[value=Delete]").hide();
    		console.log($(this).parents("tr").find("form input[value=Edit]"));
    	});
		
    	$('#editPrice').on("keyup", function(){
    		$editInput = $(this).parents("tr").find("input[name=priceToEdit]");
    		$editInput.val($(this).html());
    	});
    	$('#editName').on("keyup", function(){
    		$editInput = $(this).parents("tr").find("input[name=nameToEdit]");
    		$editInput.val($(this).html());
    	});
    	$("input[type=submit]").on("click", function(){
    		if($(this).val()=="Delete"){
    			return confirm("Are you sure you want to delete this item?  This action is permanent.");
    		}
    	});
    	$("input[type=button]").on("click", function(){
    		if($(this).val()=="Cancel"){
    			$(this).parents("tr").find(".editCancel").hide();
    		$(this).parents("tr").find(" input[value=Delete]").show();	
    		}
    	});
    	$("#addCategoryModal input[name=category]").on("keyup", canSubmitCategory
    	).on("focus", canSubmitCategory);
    	function checkForInput(){
    		console.log($(this));
    		return $(this).val().length > 0;
    	}
    	function canSubmitCategory(){
    		$(this).parents("form").find("input[type=submit]").prop("disabled", !checkForInput());
    	}
    </script>
</body>
</html>