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

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
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
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="images/logo_icon.png" type="image/png" sizes="16x16">
  </head>
  <body>
    <?php
     require("db_config.php");
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
       require("code_gen.php");
       $sql_ins3 = "INSERT INTO registrations (reg_name, reg_type, reg_school_id, reg_school_name, reg_school_class, reg_ph_no, reg_email, reg_dnt, reg_vercode, reg_status) VALUES('".$_POST["reg_name"]."', '".$_POST["reg_type"]."', '".$_POST["reg_schoolid"]."', '".$_POST["reg_schoolname"]."', '".$_POST["reg_schoolclass"]."', '".$_POST["reg_phnumber"]."', '".$_POST["reg_email"]."', '".$currentDt."', '".$hash."', 'Form Submitted')";
       if ($conn->query($sql_ins3) == TRUE) {
          require("mail_config.php");
          mail($_POST["reg_email"],"HOLBOS - Email Verification",$msg);
          $snackbar_msg = "Check Email for Comformation!!";       
       } 
       else {
          $error = "Sorry Something Went Wrong! Try Again Later";
       }
     }

        elseif ( isset($_POST["reg_name"]) OR isset($_POST["reg_schoolid"]) OR isset($_POST["reg_schoolclass"]) OR isset($_POST["reg_type"]) OR isset($_POST["reg_schoolname"]) OR isset($_POST["reg_phnumber"]) OR isset($_POST["reg_email"]) ) {
         $warning = "Please fill all the details!";
       }
       $conn->close();
    ?>
    <!-- START nav -->
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	     <div class="container">
	       <img class="navbar-brand" src="images/logo_nav.png" alt="" height="44" width="120">
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
    
    <!-- Start HOME Section -->
    <div id="home" class="hero-wrap" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-lg-6 col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"> ALL KERALA MAJOR TECH FEST <br><span style="font-size: 40px;">HOLBOS - THEORY TO PRACTICE </span></h1>
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="icon-calendar mr-2"></span>From 1st Dec 2019</p>
            <div id="timer" class="d-flex">
			        <div class="time" id="days"></div>
			        <div class="time pl-3" id="hours"></div>
			        <div class="time pl-3" id="minutes"></div>
			        <div class="time pl-3" id="seconds"></div>
			      </div>
          </div>
          <!-- <div class="col-lg-2 col"></div>-->
          <div class="col-lg-5 col-md-6 mt-0 mt-md-5 d-none d-md-block">
          	<form action="" method="post" class="request-form ftco-animate" style="width: 100%;">
          		  <h2>Enroll Now</h2>
          			<div class="row">
          				<div class="col-lg-6 col-md-6">
	    				      <div class="form-group">
	    				      	<input type="text" name="reg_name" class="form-control" placeholder="Your Full Name">
	    				      </div>
    					      <div class="form-group">
	    				      	<input type="text" name="reg_schoolid" class="form-control" placeholder="School ID">
	    				      </div>
	    				      <div class="form-group">
	    				      	<input type="text" name="reg_schoolclass" class="form-control" placeholder="School Class">
	    				      </div>
	    				    </div>
	    				    <div class="col-lg-6 col-md-6">
	    				      <div class="form-group">
	    				        <select name="reg_type" class="form-control">
                        <option value="team">Team</option>
                        <option value="individual">Individual</option>
                      </select>
	    				      </div>
							      <div class="form-group">
	    				    	  <input type="text" name="reg_schoolname" class="form-control" placeholder="School Name">
	    				      </div>
	    				      <div class="form-group">
	    				      	<input type="text" name="reg_phnumber" class="form-control" placeholder="Contact Number">
	    				      </div>	
						      </div>
				        </div>
				        <div class="form-group">
	    		      	<input type="email" name="reg_email" class="form-control" placeholder="Email Adress">
	    		      </div>
                <div class="form-group">
                  <p style="color: red;">
                    <?php 
                      if ( isset($warning) ) {
                        echo $warning;
                      } 
                    ?>   
                  </p>
                </div>
				        <div class="form-group">
				        	<div class="checkbox">
				        	   <label><input type="checkbox" name="reg_tc" value="1" class="mr-2"> I have read and accept the <a href="#" data-toggle="modal" data-target="#tacModal">Terms & Conditions</a></label>
					        </div>
				        </div>
	              <div class="form-group">
	                <input type="submit" value="Join now" class="btn btn-primary py-3 px-4">
	              </div>
	    	    </form>
          </div>
        </div>
      </div>
    </div>
    <!--End HOME Section -->
   	
	<section id="about" class="ftco-section ftco-no-pt ftco-no-pb">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/bot1.gif);">
				</div>
				<div class="col-md-7 wrap-about py-md-5 ftco-animate">
	                <div class="heading-section mb-5 pt-5 pl-md-5">
	                    <div class="pr-md-5 mr-md-5">
		                    <h2 class="mb-4">About Holbos</h2>
	                    </div>
	                    <p class="text-justify">HOLBOS a pioneering company with a great vision forward to bring in ground breaking solutions in the field of Robotics and Artificial Intelligence. Primary goal of ours is to bring in creative and effective models that can solve day to day life problems.</p>
	                    <p class="text-justify">Shinil Nath M , Founder and CEO of HOLBOS, a BTECH graduate in Mechatronics is a visionary who lead the company forefront preparing for a technological revolution in the near future. His determination and perseverance are the key factors that took the company to the heights we are today. “ Theory to Practice “ is one such initiative that will transform lives of many young students who can contribute very many things. We are a company which adapts and learn with the progress of technology and always target to give best for our customers. Let’s unite for a better and inspiring future.</p>
	                    <div class="text-center"><a href="#event" class="btn btn-primary py-4 px-5" style="border-radius: 0;">Read Guidelines</a></div>
	          		</div>
				</div>
			</div>
		</div>
	</section>

	<section id="event" class="ftco-section ftco-no-pt" style="padding-top: 112px; padding-bottom: 60px;">
      <div class="container">
        <div class="row justify-content-center mb-2">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Event Guidelines</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-10 ftco-animate text-center pb-5">
            <div class="mb-1 text-justify">HOLBOS – THEORY TO PRACTICE an all Kerala school tech fest targeting student community to bring in ground breaking solutions from their academics background gained from classroom. Students from class 6- 12 are eligible for this competition. The hidden talents are now getting a platform to showcase what they can do to transform their society for a better tomorrow. The event unlike usual Tech fest is not concerned about the academic brilliance that you expose. Instead understanding of the subject if in a case need to apply for finding better solutions then how do you do it is what matters.</div>
            <div id="guideMore" class="collapse text-justify">
            	The idea can be from SCIENCE , MATHS and SOCIAL SCIENCE or it can be a blend of all subjects. The criteria for the selection is the core idea you put forward. Timeline of the competition is very short thus you need to frame a better idea which is not practiced anywhere else. You are getting a chance to win the title but beware the idea must be unique, no copy or existing ideas works for the event. The better you make the better it will reap for you. We all are waiting to hear from you soon.<br>Good luck participants!<br> 
              The 3 stage event schedule and guidelines are explained in detail below: 
            </div>
            <a href="" class="btn btn-primary px-4 py-3" data-toggle="collapse" data-target="#guideMore">Learn More</a>
          </div>
        </div>
        <div class="row">
	        <div class="col-md-4 ftco-animate">
	          <div class="block-7 active">
	            <div class="text-center">
	            <h2 class="heading">Stage 1</h2><br>
	            <img src="images/idea.png" width="180" height="180">
	            <span class="price"><span class="number">Idea</span></span>
	            <span class="excerpt d-block">From 1 Dec - 15 Dec 2019</span>
	            <a href="#" class="btn btn-primary d-block px-2 py-3" data-toggle="modal" data-target="#ideaModal">Read Guidelines</a>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-4 ftco-animate">
	          <div class="block-7 active">
	            <div class="text-center">
	            <h2 class="heading">Stage 2</h2><br>
	           	<img src="images/prototype.png" width="180" height="180">
	            <span class="price"><span class="number">Prototype</span></span>
	            <span class="excerpt d-block">From 16 Dec -31 Dec 2019</span>
	            <a href="#" class="btn btn-primary d-block px-2 py-3" data-toggle="modal" data-target="#proModal">Read Guidelines</a>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-4 ftco-animate">
	          <div class="block-7 active">
	            <div class="text-center">
	            <h2 class="heading">Stage 3</h2><br>
	            <img src="images/grand.png" width="180" height="180">
	            <span class="price"><span class="number" style="font-size: 49px;">Grand Finale</span></span>
	            <span class="excerpt d-block">**Stay tuned for DATE**</span>	         
	            <a href="#" class="btn btn-primary d-block px-2 py-3" data-toggle="modal" data-target="#graModal">Read Guidelines</a>
	            </div>
	          </div>
	        </div>
	      </div>
      </div>
    </section>

    <section class="ftco-section ftco-gallery ftco-no-pt" style="padding-top: 112px; padding-bottom: 50px; background-color: #1162FB;">
    	<div class="container-fluid px-4">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-3" style="color: white;">Event Offers</h2>
          </div>
        </div>
    		<div class="row">
					<div class="col-md-3 ftco-animate">
	                	<div class="block-7" style="height: 90%;">
	                        <div class="text-center">
        	                    <h2 class="heading-2" style="font-size: 18px;">HOLBOS – THEORY TO PRACTICE</h2>
        	                    <p class="pricing-text pb-2 text-center">
        	                    • PRIZES WORTH 50K!!
        	                    </p><br><br><br><br><br><br>
        	                    <div class="mb-0">
	                         		<a href="#" class="btn btn-primary d-block px-2 py-3">Apply Now</a>
        	                    </div>
	                    	</div>
	                  	</div>
	                </div>
	                <div class="col-md-3 ftco-animate">
	                	<div class="block-7" style="height: 90%;">
	                        <div class="text-center">
        	                    <h2 class="heading-2" style="font-size: 18px;">10 LUCKY WINNERS!!</h2>
        	                    <p class="pricing-text pb-2 text-left">
        	                    • OUT OF THE FIRST 500 IDEA SUBMISSIONS<br>• 10 LUCKY WINNERS<br>• GET A CHANCE TO WIN A PRIZE WORTH 1K EACH!!
        	                    </p><br><br><br>
	                         	<a href="#" class="btn btn-primary d-block px-2 py-3" style="margin-bottom: 0;">Apply Now</a>
	                    	</div>
	                  	</div>
	                </div>
	                <div class="col-md-3 ftco-animate">
	                	<div class="block-7" style="height: 90%;">
	                        <div class="text-center">
        	                    <h2 class="heading-2" style="font-size: 18px;">FINALE WINNERS!!!</h2>
        	                    <p class="pricing-text pb-2 text-left">
        	                    • 2 FIRST PRIZES: WORTH 10 K EACH!!<br>• 2 SECOND PRIZES: WORTH 5K EACH!!<br>• 2 THIRD PRIZES:WORTH 2.5 K EACH!!<br>• ALL FINAL CONTESTANTS WILL GET ASSURED PRIZES!!
        	                    </p>
	                         	<a href="#" class="btn btn-primary d-block px-2 py-3">Apply Now</a>
	                    	</div>
	                  	</div>
	                </div>
	                <div class="col-md-3 ftco-animate">
	                	<div class="block-7" style="height: 90%;">
	                        <div class="text-center">
        	                    <h2 class="heading-2" style="font-size: 18px;">STAR OF HOLBOS - THEORY TO PRACTICE!!</h2>
        	                    <p class="pricing-text pb-2 text-left">
        	                    • OUR EVENT POSTER WILL BE AVAILABLE IN OUR WEBSITE.<br>• DOWNLOAD IT AND SPREAD IT. <br>• THE SCHOOL WITH MAXMUM REGISTRATION WILL BE AWARDED<br>• PRIZE WORTH 5K!!<br>(MINIMUM NUMBERS 100!!)
        	                    </p>
	                         	<a href="#" class="btn btn-primary d-block px-2 py-3">Apply Now</a>
	                    	</div>
	                  	</div>
	                </div>
        	</div>
    	</div>
    </section>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-5">
                   <div class="col-md-7 text-center heading-section ftco-animate">
                     <h2 class="mb-3">Event Timeline</h2>
                   </div>
       		</div>
       		<div class="ftco-schedule">
       		  <div class="col-md-8 col-md-offset-2">
				<div class="events-wrapper">
					<!-- event -->
					<div class="event">
						<div class="event-day">
							<div>
								<span class="day">1</span>
								<span class="year">Dec, 2019</span>
							</div>
						</div>
						<div class="event-content">
							<p class="event-time"><i class="fa fa-clock-o"></i>Starts @ 12:00 AM</p>
							<h3 class="event-title">Idea Submission</h3>
							<p>Participants can submit their idea from Dec 1st 2019 onwards or before Dec 15th 2019.</p>
							<p>Read <a href="#" data-toggle="modal" data-target="#ideaModal">Guidelines</a></p>
						</div>
					</div>
					<!-- /event -->

					<!-- event -->
					<div class="event">
						<div class="event-hour"></div>
						<div class="event-content">
							<p class="event-time"><i class="fa fa-clock-o"></i>Ends @ 12:00 PM</p>
							<h3 class="event-title">Late Date for Idea Submission</h3>
							<p>Dec 15th 2019 is last date for the idea submission for all the participants.</p>
							<p>Read <a href="#" data-toggle="modal" data-target="#ideaModal">Guidelines</a></p>
						</div>
					</div>
					<!-- /event -->

					<!-- event -->
					<div class="event">
						<div class="event-day">
							<div>
								<span class="day">16</span>
								<span class="year">Dec, 2019</span>
							</div>
						</div>
						<div class="event-content">
							<p class="event-time"><i class="fa fa-clock-o"></i>Starts @ 12:00 AM</p>
							<h3 class="event-title">Prototype Submission</h3>
							<p>Participants can submit the prototype for their idea from Dec 16th 2019 onwards or before Dec 31th 2019.</p>
							<p>Read <a href="#" data-toggle="modal" data-target="#proModal">Guidelines</a></p>
						</div>
					</div>
					<!-- /event -->

					<!-- event -->
					<div class="event">
						<div class="event-hour"></div>
						<div class="event-content">
							<p class="event-time"><i class="fa fa-clock-o"></i>Ends @ 12:00 PM</p>
							<h3 class="event-title">Late Date for Idea Submission</h3>
							<p>Dec 31th 2019 is last date for the prototype submission for all the participants.</p>
							<p>Read <a href="#" data-toggle="modal" data-target="#proModal">Guidelines</a></p>
						</div>
					</div>
					<!-- /event -->

					<!-- event -->
					<div class="event">
						<div class="event-day">
							<div>
								<img src="images/grand.png" width="87" height="87">
							</div>
						</div>
						<div class="event-content">
							<p class="event-time"><i class="fa fa-clock-o"></i>**Stay tuned for DATE**</p>
							<h3 class="event-title">Grand Finale</h3>
							<p>Grand finale's date will be announced soon. So stay tuned and start working on your idea.</p>
							<p>Read <a href="#" data-toggle="modal" data-target="#graModal">Guidelines</a></p>
						</div>
					</div>
					<!-- /event -->

				</div>
			  </div>
			  <div class="text-center"><a href="#" class="btn btn-primary py-4 px-5" data-toggle="modal" data-target="#regModal">Register Now</a></div>
          	</div>
		</div>
	</section>

    <section class="ftco-section-parallax ftco-section ftco-no-pt" style="padding-bottom: 0;">
      <div class="parallax-img d-flex align-items-center pt-5 pb-5" style="background-image: url('images/bg_1.jpg');">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-7 text-center heading-section ftco-animate">
              <h2 style="">Subcribe to Us!</h2>
              <p style="color: black;">Don't miss a single update. Subscribe to our notification channel to get all the important messages at instant. Let's go further.</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-8">
                  <form action="" class="subscribe-form" method="post">
                    <div class="form-group d-flex">
                      <input type="email" name="sub_email" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="contact" class="ftco-section" style="padding-bottom: 25px;">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Contact Us</h2>
          </div>
        </div>
        <div class="container">
        <div class="row d-flex mb-5 contact-info text-center">
          <div class="w-100"></div>
          <div class="col-md-6 border-right">
          	<span class="icon icon-map-marker"style="font-size: 65px; color: #1162FB;"></span>
          	<h5>Address</h5>
            <p>24/2A1, AKKM Tower,<br>South Kalamassery, Cusat Junction,<br>Ernakulam - 682022</p>
          </div>
          <!--
          <div class="col-md-4">
          	<span class="icon icon-phone" style="font-size: 55px; color: #1162FB;"></span>
          	<h5>Phone</h5>
            <p><a href="tel://1234567920">+91 1235 2355 98</a></p>
          </div>
       	  -->
          <div class="col-md-6">
          	<span class="icon icon-envelope" style="font-size: 65px; color: #1162FB;"></span>
          	<h5>Email</h5>
            <p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
          </div>
        </div>
        <div class="row d-flex">
        	<div class="col-md-12 text-center">
        		<h4 class="pb-3">or Send us your message!</h4>	
        	</div>
        </div>
        <div class="row d-flex">
          <div class="col-md-12 d-flex">
            <form action="" method="post" style="width: 100%;">
              <div class="row">
              	<div class="col-md-6">
              		<div class="form-group">
                      <input type="text" name="msg_name" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                      <input type="email" name="msg_email" class="form-control" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                      <input type="text" name="msg_sub" class="form-control" placeholder="Subject">
                    </div>
              	</div>
              	<div class="col-md-6">
              		<div class="form-group">
                      <textarea name="msg_body" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group text-md-right">
                      <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5 mr-0">
                    </div>
              	</div>
              </div>
            </form>
          
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
    
  <!-- Register Modal -->
  <div class="modal fade" id="regModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal body -->
        <div class="modal-body">
          <form action="" method="post" class="request-form ftco-animate" style="width: 100%;">
                <h2>Enroll Now</h2>
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <input type="text" name="reg_name" class="form-control" placeholder="Your Full Name">
                    </div>
                    <div class="form-group">
                      <input type="text" name="reg_schoolid" class="form-control" placeholder="School ID">
                    </div>
                    <div class="form-group">
                      <input type="text" name="reg_schoolclass" class="form-control" placeholder="School Class">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <select name="reg_type" class="form-control">
                        <option value="team">Team</option>
                        <option value="individual">Individual</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="text" name="reg_schoolname" class="form-control" placeholder="School Name">
                    </div>
                    <div class="form-group">
                      <input type="text" name="reg_phnumber" class="form-control" placeholder="Contact Number">
                    </div>  
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" name="reg_email" class="form-control" placeholder="Email Adress">
                </div>
                <div class="form-group">
                  <p style="color: red;">
                    <?php 
                      if ( isset($warning) ) {
                        echo $warning;
                      } 
                    ?>   
                  </p>
                </div>
                <div class="form-group">
                  <div class="checkbox">
                     <label><input type="checkbox" name="reg_tc" value="1" class="mr-2"> I have read and accept the <a href="#" data-toggle="modal" data-target="#tacModal">Terms & Conditions</a></label>
                  </div>
                </div>
                <div class="form-group">
                  <input type="submit" value="Join now" class="btn btn-primary py-3 px-4">
                </div>
            </form>
        </div>        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>        
      </div>
    </div>
  </div>

  <!-- T&C Modal -->
  <div class="modal fade" id="tacModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h2 class="modal-title">Terms and Conditions</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>  
        <!-- Modal body -->
        <div class="modal-body">
          <p>
          	1.	The participant will be only considered as registered candidate once payment is confirmed. Initial registering process will not be taken into account without payment done.<br>
			2.	The candidate will receive a mail from our side once registration is done followed by a mail after payment is received. The two emails will be from our side don’t consider any personal or other spam mail stating confirmation. The company will not be responsible for such information and you can notify us if you receive any such mails and we will guide you further.<br>
			3.	The student should bring their school ID once they are selected for final events. The school ID is compulsory. In case of not carrying school ID the student need to bring a concern letter from principal with school seal to take part in the final competitions.<br>
			4.	The submission of idea for the primary stage will be the initial goal thus a keen and relevant idea will be considered for next stage. The event is time scheduled so filtering will be done accordingly. The final list of students selected for further stages will be announced then after. The decision taken by judging panel is final and no further talks will be appreciated.<br> 
			5.	The second stage of competition is the final stage for selection to finals thus the presentation will be the key aspect of your chance to finale. So do go for revise of your work because once submitted you can’t edit it further. As we have lot many applicants to scrutinize so kindly cooperate with us and make sure you enter to finals. The decision taken will be final by the judging panel and no further talks will be appreciated.<br>
			6.	The event dates are tentative and will be notified in our official site followed by our official social media platforms. Don’t consider any spam messages spread via Social Medias.<br>
			7.	The dates of idea submission and prototyping if in case of any issues will be extended and will be published in the website for your understanding. Please be a regular visitor of the site throughout the event for updates.<br>
			8.	The announcement of limited period offers and target offers are bounded with proper guidelines. The chance of getting those prizes required the person to meet the guidelines specified by the event and also the final decision will be taken by the event committee.<br>
			9.	The cash prize announced will be distributed to winners immediately after the finale is over. The winners selected will be final and the decision will be taken by the judging panel.<br>
			10.	A disciplined event is what we are aiming for so kindly cooperate with us and be a part of a great transformation.

          </p>
        </div>        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>        
      </div>
    </div>
  </div>


  <!-- Idea Stage Modal -->
  <div class="modal fade" id="ideaModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">      
        <!-- Modal Header -->
        <div class="modal-header">
          <h2 class="modal-title">Idea Stage - Rules & Regulations</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>       
        <!-- Modal body -->
        <div class="modal-body">
          •	The idea submission stage begins from DEC 1 2019 and it will be open till 15 DEC 2019.<br>
		  •	Participant can take part in the competition as an individual or team. The registration fee for the competition is RS 100 per participant.<br>
		  •	A team can consist of Minimum 2 members and Maximum of 4 members. A team name can be mentioned when registration is done.<br> 
		  •	Participant should fill all the details in the register column and mention an email id for future communications. Participant who doesn’t have one can use their parent’s email id and register for the event.<br>
		  •	The registration fees will be collected from school by our team all you need to do is pay the amount to your office with your details mentioned.<br>
  		  •	The idea can be from science, mathematics and social science or it can be a combination of all subjects in an academics point of view. The evaluation team will consider the social impact and the practical possibilities and how cost effective will be the idea. The idea must fall into the benchmarks mentioned by us. The more you improvise the better the chance of selection.<br>
  		  •	The idea must be submitted to us via official email id given below and also make sure to conclude within 500 words.<br>
  		  •	The idea must be unique and should be bounded to your textbooks reference. Participant can go beyond the syllabus provided the idea presented should satisfy the evaluating team and must convey that it was a concept made from scratch all by the participant and it must be proven with your presentation. If not the idea will not be considered.<br>

  		  •	The sample format of the idea inspired from textbooks is given below for your reference:<br>
            PROBLEM STATEMENT:-<br>
            Food is a basic necessity of everyone, but the scarcity of it makes people fight for it and many die starving. Change in climate pattern and crop failure is an issue that needs an effective solution (idea inspired from science textbook of class 9).<br>
            SOLUTION:-<br>
            A one roof model of farming for everyone will make a difference in our society. Every individual will get access to farming practice or can opt for a tenant land for the project and get subsidy from the government side. The project involves making food items for a region from every village township etc. The preferred one should meet the nutrients requirement and thus the problem of food scarcity can be avoided as we will take a survey of people belonging to various regions age group etc (inspired from mathematics textbook of class 6). The data taken will give the numbers and will help to produce the necessary amount for all. The transportation and other expenses can be dealt with proper channels.<br>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

  <!-- Prototype Stage Modal -->
  <div class="modal fade" id="proModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">      
        <!-- Modal Header -->
        <div class="modal-header">
          <h2 class="modal-title">Prototyping Stage - Rules & Regulations</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>       
        <!-- Modal body -->
        <div class="modal-body">
          •	The prototyping stage begins from 16 Dec 2019 onwards and will close by 31 Dec 2019.<br>
		  •	This stage involves proving your idea is a practically viable solution. The participant should make a power point presentation highlighting the core idea and the necessary elements to make it possible.<br>
		  •	The presentation must be within 10 slides and should discuss the following headings:-<br>
             1.	Project title: name of your project and few line description about the project.<br>
             2.	Project timeline: Time taken to complete the project.<br>
             3.	Project diagram (if any): clear diagrams and working principle followed by formulas if any.<br>
             4.	Project cost: material cost and final product cost when manufactured.<br>
             5.	Materials required: list of items needed.<br>
             6.	Impact to the society: The impact it creates to society and how it will be benefitted for the masses.<br>
             7.	Marketing scale: how many consumers will buy your product and how you plan to market?<br>
		  •	The attached power point presentation is a sample format and students trying to replicate the exact one will not be considered for selection and also students should give a detail description of materials and their cost(Table format and diagrams gain more chance of selection).<br>
		  •	The prototype can be a working model or a model that can be easily transformed to a working prototype.<br>
		  •	No projects which even after passing idea submission stage and not reaching the expectations of prototyping will be considered for the final selection.<br>
          •	The contribution from all participants in a group is mandatory and can earn you more points and the chance to finale will be easier.<br>
		  <div class="text-center">
		  	<a href="docs/PROTOTYPING_sample.pptx" class="btn btn-primary py-3 px-4" download="Prototype Sample">Download Sample</a>
		  </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

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
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>