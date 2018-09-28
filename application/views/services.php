<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Careerprism Services</title>

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
  </head>
  <body>
	<?php include ('menu.php'); ?>

	<div id="breadcrumb">
		<div class="container">
			<div class="breadcrumb">
				<li><a href="/">Home</a></li>
				<li>Services</li>
			</div>
		</div>
	</div>

	<div class="services">
		<div class="container">
			<h3>Our Services</h3>
			<hr>
			<div class="col-md-6">
				<img src="<?php echo base_url(); ?>assets/template/images/4.jpg" class="img-responsive">
				<p>

                </p>
			</div>
			<div class="col-md-6">
				<div class="media">
					<ul>
						<li>
							<div class="media-left">
								<i class="fa fa-pencil"></i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Testing</h4>
								<p></p>
							</div>
						</li>
						<li>
							<div class="media-left">
								<i class="fa fa-book"></i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Counselling</h4>
								<p></p>
							</div>
						</li>
						<li>
							<div class="media-left">
								<i class="fa fa-rocket"></i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Training</h4>
								<p></p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>




   <?php
   include ('footer.php');
   ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?php echo base_url(); ?>assets/template/js/jquery-2.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>assets/template/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/template/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/js/jquery.isotope.min.js"></script>
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