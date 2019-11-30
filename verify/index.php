<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HOLBOS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Stock Font Link
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
	  -->
	  <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    
    <!-- Stock Links
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
	  -->

    <!-- Stock Links
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
	  -->

    <!-- Stock Links
    <link rel="stylesheet" href="css/flaticon.css">
	  -->
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="icon" href="../images/logo_icon.png" type="image/png" sizes="16x16">
  </head>
  <body>
    <?php
     require("../db_config.php");
     if ( isset($_POST["sub_email"]) ) {
       date_default_timezone_set('Asia/Kolkata');
       $currentDt = date( 'Y-m-d h:i:s A', time () );
       $sql_ins1 = "INSERT INTO subscribers (sub_email, sub_dt) VALUES('".$_POST["sub_email"]."', '".$currentDt."')";
       if ($conn->query($sql_ins1) == TRUE) {
          $snackbar_msg = "You Has Subscribed";       
       } 
       else {
          $error = "Sorry Something Went Wrong! Try Again Later";
       }
     }

     if ( isset($_POST["msg_name"]) AND isset($_POST["msg_email"]) AND isset($_POST["msg_sub"]) AND isset($_POST["msg_body"]) ) {
       date_default_timezone_set('Asia/Kolkata');
       $currentDt = date( 'Y-m-d h:i:s A', time () );
       $sql_ins2 = "INSERT INTO messages (msg_name, msg_email, msg_subject, msg_body, msg_dt) VALUES('".$_POST["msg_name"]."', '".$_POST["msg_email"]."', '".$_POST["msg_sub"]."', '".$_POST["msg_body"]."', '".$currentDt."')";
       if ($conn->query($sql_ins2) == TRUE) {
          $snackbar_msg = "Message Sent";       
       } 
       else {
          $error = "Sorry Something Went Wrong! Try Again Later";
       }
     }

     if ( isset($_POST["reg_name"]) AND isset($_POST["reg_schoolid"]) AND isset($_POST["reg_schoolclass"]) AND isset($_POST["reg_type"]) AND isset($_POST["reg_schoolname"]) AND isset($_POST["reg_phnumber"]) AND isset($_POST["reg_tc"]) AND isset($_POST["reg_email"]) ) {
       date_default_timezone_set('Asia/Kolkata');
       $currentDt = date( 'Y-m-d h:i:s A', time () );
       $sql_ins3 = "INSERT INTO registrations (reg_name, reg_type, reg_school_id, reg_school_name, reg_school_class, reg_ph_no, reg_email, reg_dnt) VALUES('".$_POST["reg_name"]."', '".$_POST["reg_type"]."', '".$_POST["reg_schoolid"]."', '".$_POST["reg_schoolname"]."', '".$_POST["reg_schoolclass"]."', '".$_POST["reg_phnumber"]."', '".$_POST["reg_email"]."', '".$currentDt."')";
       if ($conn->query($sql_ins3) == TRUE) {
          $snackbar_msg = "Check Email for Comformation!!";       
       } 
       else {
          $error = "Sorry Something Went Wrong! Try Again Later";
       }
     }

        if ( isset($_POST["reg_name"]) OR isset($_POST["reg_schoolid"]) OR isset($_POST["reg_schoolclass"]) OR isset($_POST["reg_type"]) OR isset($_POST["reg_schoolname"]) OR isset($_POST["reg_phnumber"]) OR isset($_POST["reg_email"]) ) {
         $warning = "Please fill all the details!";
       }
       $conn->close();
    ?>
    <!-- START nav -->
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	     <div class="container">
	       <img class="navbar-brand" src="../images/logo_nav.png" alt="" height="44" width="120">
	       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	         <span class="oi oi-menu"></span>
	       </button>

	       <div class="collapse navbar-collapse" id="ftco-nav">
	         <ul class="navbar-nav ml-auto">
	           <li class="nav-item active"><a href="#home" class="nav-link">Home</a></li>
	           <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
	           <li class="nav-item"><a href="#event" class="nav-link">Event</a></li>
	           <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
	           <li class="nav-item cta mr-md-2"><a href="#" class="nav-link" data-toggle="modal" data-target="#regModal">Register Now</a></li>
	         </ul>
	       </div>
	     </div>
	  </nav>
    <!-- END nav -->
   	
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 img img-2 d-flex justify-content-center align-items-center">
              <img src="../images/success.gif" width="200" height="200">
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="heading-section mb-5 pt-5 pl-md-5">
                      <div class="pr-md-5 mr-md-5 text-center">
                        <h2 class="mb-4">Email Successfully Verified!</h2>
                      </div>
                      <p class="text-justify">Your email has been successfully verified. For completing this enrollment, Please pay the registeration amount at your registered school office.</p>
                      <div class="text-right"><a href="../" class="btn btn-primary py-4 px-5" style="border-radius: 0;">Go to Homepage</a></div>
                </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section" style="padding-top: 35px; padding-bottom: 35px;">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">HOLBOS</h2>
              <p>All kerala major tech fest.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <!-- <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li> -->
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">24/2A1, AKKM Tower,<br>South Kalamassery, Cusat Junction,<br>Ernakulam - 682022</span></li>
	                <!-- <li><a href="#"><span class="icon icon-phone"></span><span class="text">+91 </span></a></li> -->
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@domain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <p>
  				HOLBOS Copyright &copy; <script>document.write(new Date().getFullYear());</script> | All rights reserved.
			</p>
          </div>
        </div>
      </div>
    </footer>


  <!-- Grand Stage Modal -->
  <div class="modal fade" id="graModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">      
        <!-- Modal Header -->
        <div class="modal-header">
          <h2 class="modal-title">Grand Stage - Rules & Regulations</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>       
        <!-- Modal body -->
        <div class="modal-body">
          Grand finale dates will be announced soon. So stay tuned and start working on your idea.
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

  <!-- Toast -->
  <div id="snackbar" class="snackbar"><?php echo $snackbar_msg; ?></div>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <?php
   if ( isset($snackbar_msg) OR isset($error) ) {
     echo '<script> var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000); </script>';
   }
  ?>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src="../js/main.js"></script>
    
  </body>
</html>