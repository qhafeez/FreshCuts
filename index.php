<?php
include('inc/connection.php');
include('inc/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Fresh Cuts by Jackie</title>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link rel="stylesheet" href="slick/slick.css">
  <link rel="stylesheet" href="slick/slick-theme.css">
  <link rel="stylesheet" href="src/css/lightbox.css">
  <link href="https://fonts.googleapis.com/css?family=Oleo+Script|Oleo+Script+Swash+Caps|Petit+Formal+Script" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
  <body >
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        
    <!--navbar -->
    <div class="navbar navbar-full " style="margin-bottom:0">
      <div class="container">
        <div class="navbar-header">
        
        <a href="#" class="navbar-brand">Fresh Cuts</a>

        <button id="button" class="navbar-toggle bg-inverse" data-toggle="collapse" data-target=".navHeaderCollapse">
          
          &#9776

        </button>
                </div>

     

      
      <div class="collapse navbar-collapse navHeaderCollapse">

          <ul class=" nav navbar-nav navbar-right">


            <li class="navLink"><a href="">Services</a></li>
            <li class="navLink"><a href="">Gallery</a></li>
            <li class="navLink"><a href="">Hours</a></li>
            <li class="navLink"><a href="">Contact</a></li>
            <li><a href='admin_login.php'>Login</a></li>

            


          </ul>

        
      </div>
    </div>
      
    </div>
    <!--/navbar -->

              
            <div class="mainPic max-width">

              <img class="bgpic" src="location.jpg">
            
              <!-- <div class="container text-center">
                <h1 class="" >Fresh Cuts</h1>
                <p class="">The Hair Salon in Lehigh Acres</p>
              </div> -->
              <img class="arrow" src="downarrow.svg">
            </div>

<div class="container">
    <div id="services" class="clearfix text-center">
      <h3>Services <span>(tap images for full list)</span></h3>
    </div>
    

    <div class="row text-center max-width" style="box-shadow: 5px 5px 10px rgba(0,0,0,0.6);">
      <a href="" role="button" data-toggle="modal" data-target="#servicesModal">
      <div  id="services"  class=" col-md-4 col-md-offset-0 removePad">
        
        
          <div class="serviceWrap">
          <div style="background:black; " class="img-responsive center-block ">
          <img  class="servicesPic center-block  img-responsive " src="shampoo.jpg">
        </div>
          <p id="description">Women's Cuts</p>
        </div>
          

          
       
      </div></a>
      
      <a href="" role="button" data-toggle="modal" data-target="#servicesModal">
      <div id="services" class=" col-md-4 col-md-offset-0 removePad" >
        
        
          <div class="serviceWrap">
          <div style="background:black; " class=" center-block ">
          <img  class="servicesPic center-block  img-responsive " src="man-getting-haircut.jpg">
        </div>
          <p id="description">Men's Cuts</p>
        </div>
               
      </div></a>
      
      <a href="" role="button" data-toggle="modal" data-target="#servicesModal">
      <div  id="services"   class=" col-md-4 col-md-offset-0 removePad">
        
        
          <div class="serviceWrap" >
          <div style="background:black; " class=" center-block ">
          <img  class="servicesPic center-block  img-responsive " src="shampoo.jpg">
        </div>
          <p id="description">Seniors</p>
        </div>
               
      </div></a>

 
    
      
    </div>
    <div id="gallery" class="text-center max-width">
      <h3>Gallery <span class="swipe">(swipe)</span></h3>
      <p>tap for larger image</p>
        <div class="carousel">
          <?php 
            foreach(getImages() as $image){
              
              displayCarouselImages($image);
          }
          ?>
          
        </div>
   </div>

    

    <div class="container text-center">

    <div class="row">
      
      <div id="hours" class="col-md-4  "><h3>Hours</h3>
        <div class="row">
          <p class="col-xs-6">Monday</p><p class="col-xs-6">Closed</p>
          <p class="col-xs-6">Tuesday</p><p class="col-xs-6">10am - 4pm</p>
          <p class="col-xs-6">Wednesday</p><p class="col-xs-6">10am - 4pm</p>
          <p class="col-xs-6">Thursday</p><p class="col-xs-6">10am - 4pm</p>
          <p class="col-xs-6">Friday</p><p class="col-xs-6">10am - 4pm</p>
          <p class="col-xs-6">Saturday</p><p class="col-xs-6">10am - 4pm</p>
          <p class="col-xs-6">Sunday</p><p class="col-xs-6">Closed</p>
          
        </div>

      </div>
     
      
      <div id="contact" class="col-md-4  ">
        <h3>Location</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d114140.02438143018!2d-81.82417061150208!3d26.620428751265692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x88db6c424f07a9b7%3A0x71d66ab105692bd7!2sfresh+cuts+lehigh+acres+fl!3m2!1d26.6204459!2d-81.7541303!5e0!3m2!1sen!2sus!4v1474999521969" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
        <p>We are located at:</p> 
        <p>5612 8th St W #1, Lehigh Acres, FL 33971</p>
        <p type="tel">Call us at: (239) 369-4247</p>
      </div>
    

    <div id="facebook"  class=" col-md-4">
        <h3>Like us!</h3>
      
    <div  class="text-center  ">
      
      
        
      <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffreshcutsbyjackie&tabs=timeline&width=300&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
    
      
    </div>
  </div>
</div>


  </div>

   <!-- Modal -->
  <div class="modal fade" id="servicesModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">The Menu</h4>
        </div>
        <div class="modal-body row">
          <?php 
            $category_id=0;
            foreach(getServices() as $service){
              if($category_id != $service['category_id']){
                $category_id = $service['category_id'];
                echo "<p class='catName col-xs-12 text-center'>".$service['CategoryName']."</p>";      
              }
            
            echo "<p class='col-xs-8 strong'>".$service['service_name']."</p>"."<p class='col-xs-4'>$".$service['service_price']."</p>";
          }
          ?>

          
        </div>
        
      </div>
      
    </div>
  </div>

<footer class="col-xs-12 panel-footer">Fresh Cuts &copy 2016</footer>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="slick/slick.min.js"></script>
    <script src="src/js/lightbox.js"></script>
    <script>
    $('.carousel').slick({
      dots:true,
      
      slidesToShow:4,
      slidesToScroll:1,
      arrows:false,
      infinite:false,
      responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
        infinite:false,

        arrows:false

      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        infinite:false,
        dots:true,
        slidesToScroll: 1,
        arrows:false

      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots:false,
        infinite:false,

        arrows:false       

      }
    }
    ]
    });
    $('.arrow').on('click', function(){
      $('html, body').animate({
        scrollTop: $('#services').offset().top
      }, 700);
    });

    $('.navLink').click(function(e){

      if($(this).text()!=="Call Us!"){
      console.log($(this).parent());
      e.preventDefault();
        var div = '#'+$(this).text().toLowerCase();
        $('html, body').animate({
          scrollTop: $(div).offset().top
        },1000); 
        $(this).closest('div').collapse('hide');
        
        }
    });
    $('.serviceWrap img').on('hover', function(){
        $(this).animate({
          filter: 'blur(10px)'
        }, 500);
    });
    /*$('.wrap').click(function(){
      $(this).css({
        transition:'1s',
        transform:'scale(0.95,0.98)',
      });
      $('.overlay').css({
        visibility:'visible',
      });
      
    });*/
  function square(){
    var width = $(".serviceWrap").width();
    $(".serviceWrap").css("height", width+"px");
    $(".servicesPic").css("height", width+"px");
};
    square();  
    $(window).on("resize", square);
    </script>
  </body>
</html>