<?php
session_start();
// var_dump($_FILES);
include("inc/connection.php");
include("inc/functions.php");

notLogged();


$currentUser = getCurrentUser();
if($_SERVER["REQUEST_METHOD"]=="POST"){

	if($_POST['submit']=="Add Image"){
		$caption = post('caption', "STR");
		$maxSize = 20000000;
		//$image = trim(filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_STRING));
		
		//folder to save image in
		$targetPath = "uploads/";
		$targetPath = $targetPath . basename( $_FILES['uploadedfile']['name']);
		$filePath = $_FILES['uploadedfile']['tmp_name'];
		
		if(!empty($filePath) && !empty($caption)){
		if($_FILES['uploadedfile']['size'] < $maxSize){
			if(strtolower(substr($_FILES['uploadedfile']['name'], -3)) == "jpg" ){
				$exif = exif_read_data($_FILES['uploadedfile']['tmp_name']);
					if (!empty($exif['Orientation'])) {
					    $imageResource = imagecreatefromjpeg($filePath); // provided that the image is jpeg. Use relevant function otherwise
					    switch ($exif['Orientation']) {
					        case 3:
					        $image = imagerotate($imageResource, 180, 0);
					        break;
					        case 6:
					        $image = imagerotate($imageResource, -90, 0);
					        break;
					        case 8:
					        $image = imagerotate($imageResource, 90, 0);
					        break;
					        default:
					        $image = $imageResource;
					    } 
					} else{
						$image = imagecreatefromjpeg($filePath);
					}
				if(imagejpeg($image, $targetPath)){
					if(!imageExists($targetPath)){
						
					//adds image to database	
						if(addImage($targetPath, $caption)){
							imagedestroy($image);
							

						
						$_SESSION['success']= "Image with caption of \"" . $caption . "\" was added succesfully";

						redirect('add_pic.php');
						exit;
					} else{
						$_SESSION['error'][] = "There was an error uploading the file";
					}
				} else {
					$_SESSION['error'][]= "The image already exists";
				}
			}
			 
				} else{
					$_SESSION['error'][]= "image must be jpeg";
			
			}
		} else{
			$_SESSION['error'][]="File size too large";
		}

		redirect('add_pic.php');
		exit;

	} else {
		$_SESSION['error'][]="Please select a file to upload AND give it a caption";
		redirect('add_pic.php');
		exit;
	}
}

		//Delte image


	if($_POST['submit']== "Delete"){
		$imgToDelete = post('imgToDelete', "INT");
		// if(deleteImageFromDB($imgToDelete)){
			if(unlink(getImageFile($imgToDelete)[0])){
				if(deleteImageFromDB($imgToDelete)){
					$_SESSION['msg']= "Picture was deleted successfully";
					redirect('add_pic.php');
					exit;
				}
			}

	}
}
include("inc/header.php");
?>
  
	<div class="container ">
		
		
		<div class="row text-center welcome">
			<h2>Welcome, <?php echo $currentUser ?></h2>
		
			<input type='button' class='btn col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3' role="button" data-toggle="modal" data-target="#addPicture" value='Add New Picture' />
		</div>
		
					  <?php 	flashMessage(); 	?>
	
	


	
</div>
<div>

	<table class="col-xs-12 col-sm-8 col-sm-offset-2 pictureTable">

	<thead>
		<tr>
			<th>Caption</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
	</thead>
<?php 

 foreach(getImages() as $image){
		
 		displayImagesInTable($image);
	}

?>
</table>
</div>
  <!-- Modal -->
  <div class="modal fade" id="addPicture" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Add A New Picture</h4>
        </div>
        <div class="modal-body row">
            <form id="service_input_form" class="col-xs-12 col-sm-8 col-sm-offset-2" enctype="multipart/form-data" action="add_pic.php" method="post">
				
				<div class="form-group">
					
					<input class="form-control col-xs-12 " type="text" name="caption" placeholder='Type caption here' />
				</div>
				<div class="form-group">
					
					<input class="form-control col-xs-12 " type="file" name="uploadedfile" value="" />
				</div>
				<div class="form-group">
					<input class="form-control col-xs-12 btn" name="submit" type="submit" value="Add Image" />
				</div>
			</form>
          
        </div>
        
      </div>
      
    </div>
  </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
    	$(window).bind("pageshow", function(event) {
   			 if (event.originalEvent.persisted) {
       				 window.location.reload() 
    			}
});
    	$("input[type=submit]").on("click", function(){
    		if($(this).val()=="Delete"){
    			return confirm("Are you sure you want to delete this item?  This action is permanent.");
    		}
    	});
    </script>
</body>
</html>

