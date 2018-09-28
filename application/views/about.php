<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Careerprism About Us</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/template/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/animate.css">
	<link href="<?php echo base_url(); ?>assets/template/css/prettyPhoto.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/template/css/style.css" rel="stylesheet" />	
    <link rel="icon" href="<?php echo base_url(); ?>assets/template/images/fav.jpg" type="image/jpg" sizes="16x16">	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
	<style>
    .scale{top: -18px;
    position: relative; clear:both; width:100%;}
    .scale span 
	{
    position: absolute;
    height: 5px;
    border-left: 1px solid #999;
    font-size: 0;
    }
    .scale ins 
	{
    color: #333;
    font-size: 12px;
    text-decoration: none;
    position: absolute;
    left: 0;
    top: 10px;
    line-height: 1;
    }
    </style>

  </head>
  
  <body>
 <?php include('menu.php'); ?>
	
	<div id="breadcrumb">
		<div class="container">	
			<div class="breadcrumb">							
				<li><a href="index.php">Home</a></li>
				<li>About Us</li>			
			</div>		
		</div>	
	</div>
	
	<div class="aboutus">
		<div class="container">
			<h3>What We deal with</h3>
			<hr>
			<div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
				<img src="<?php echo base_url(); ?>assets/template/images/7.jpg" class="img-responsive">
				<h4>About Us</h4>
				<p>
				Career Counselling is a great help to today's young generation and their parents. 
				It helps them to find those courses or careers where they can really excel and be extra-ordinary performers.
				We conduct Personality and aptitude Test , along with career counselling guidance from the experts. 
				We , A pool of psychologists designed a single testing , interactive couselling process for the students.
				All the tests are proven worthy , which make student to choose the right stream.
				</p>
			</div>
			<div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
				<div class="skill">
					<h2>Skills</h2>

					<div class="progress-wrap">
						<h3>Students Career guidance</h3>
						<div class="progress">
						  <div class="progress-bar  color1" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
							<span class="bar-width">85%</span>
						  </div>

						</div>
                        
                        <div class="scale">
                        <span style="left: 0%"> <ins style="margin-left: -4px;">0</ins></span>
                        <span style="left: 25%"> <ins style="margin-left: -4px;">10</ins></span>
                        <span style="left: 50%"><ins style="margin-left: -2.5px;">20</ins></span>
                        <span style="left: 75%"><ins style="margin-left: -2.5px;">30</ins></span>
                        <span style="left: 100%"><ins style="margin-left: -2.5px;">40</ins></span>
                        </div>
            
					</div>

					<div class="progress-wrap">
						<h4>Internship programs</h4>
						<div class="progress">
						  <div class="progress-bar color3" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
							<span class="bar-width">80%</span>
						  </div>
						</div>
					</div>

					<div class="progress-wrap">
						<h4>Test</h4>
						<div class="progress">
						  <div class="progress-bar color4" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
							<span class="bar-width">90%</span>
						  </div>
						</div>
					</div>
				</div>				
			</div>
                       
            
		</div>
	</div>
	
	<div class="our-team">
		<div class="container">
			<h3>Our Team</h3>	
			<div class="text-center">
				<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
					<img src="<?php echo base_url(); ?>assets/template/images/services/1.jpg" alt="" >
					<h4>Satya Raghavi</h4>
					<p></p>
				</div>
				<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
					<img src="<?php echo base_url(); ?>assets/template/images/services/2.jpg" alt="" >
					<h4>Chaitanya</h4>
					<p></p>
				</div>
				<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
					<img src="<?php echo base_url(); ?>assets/template/images/services/3.jpg" alt="" >
					<h4>Archana</h4>
					<p></p>
				</div>
			</div>
		</div>
	</div>
	
   <?php
   include('footer.php');
   ?>
	
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?php echo base_url(); ?>assets/template/js/jquery-2.1.1.min.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>assets/template/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/template/js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>  
	<script src="<?php echo base_url(); ?>assets/template/js/wow.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/template/js/functions.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script> 
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
        
    <script type="text/javascript">
    $( "#demo" ).click(function(e)
    {
     e.preventDefault();
     $("#vedio").dialog
     ({
      height: 400,
      width:  800
      });
    });
    </script>
    
</body>
</html>