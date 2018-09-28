<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Careerprism MY ACCOUNT</title>

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
	a:hover{
		background-color:#C90;
	}
	</style>
  </head>
  <body>
	<?php 
	include ('menu.php'); 
	
	?>

	<div id="breadcrumb">
		<div class="container">
			<div class="breadcrumb">
				<li><a href="/">Home</a></li>
				<li>MY ACCOUNT</li>
			</div>
		</div>
	</div>

	<div class="services">
		<div class="container">
          <h3>MY ACCOUNT | 
          <span style="font-weight:500px; border: 1px solid #C90; padding:5px;"> 
          <a href="<?php echo base_url(); ?>logout">Logout</a>
          </span>
          </h3>
			<hr>
         
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