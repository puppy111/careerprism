<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Careerism Result</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/template/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/font-awesome.min.css">
	<link href="<?php echo base_url(); ?>assets/template/css/style.css" rel="stylesheet" />	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!---------slider--------->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/slider.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/jquery-ui.css"> 
    <script src="<?php echo base_url(); ?>assets/template/js/prefixfree.min.js"></script>
    <!---------slider--//------->

  </head>
  <style>
  .container .text-center{ margin-top:2%; }
  </style>
  <body>
	
    <?php include('menu.php'); ?>
    
    <div id="breadcrumb">
		<div class="container">	
			<div class="breadcrumb">							
				<li><a href="index.php">Home</a></li>
				<li>Career Aptitude Test</li>			
			</div>		
		</div>	
	</div>
    
    <!--/#main-slider-->
    	
		<div class="container" style="color:#000; font-weight:bold;">
        <h1 style="color:#900; font-weight:bold;"> Congratulation's !!! You Have Successfully completed your  Aptitude Test </h1>
        <br/>
        <h1 style="color:#00F;">
        Based on your responses, we recommend the following careers ,with Top (1) in preference. <br/>
        </h1>
        <br/>
        <br/>
             
			 <?php 
			   //echo '<pre>';print_r($res); echo '</pre>';
			   $sn=1;
			   foreach($res as $k4=>$val)
			   { 
					//echo '<br/>';
					//echo '<pre>';print_r($res);echo '<pre><br/>';
					//echo '<pre>++++++('.($k4).')++++++<br/>';
					//echo '<pre>++++++('.($val).')++++++<br/>';
					
					echo '('.$sn.')'.ucfirst($k4); 
					$cnt = sizeof($val);
					if(sizeof($val)>=1)
					{
						 echo '(';
						 for($i=0;$i<$cnt;$i++)
						 {
							$count_keys[$i] = $val[$i];
							//echo '<pre>';print_r($count_keys);echo '<pre><br/>';
							
							if($val[$i]!='NA')
							{
								echo $val[$i].'/'; 
							}
						 }
					    echo ')<br/>';
					}
					$sn++; 
			   }
			   ?>
               <br/><br/>
               <h1 style="color:#900; font-weight:bold;">
               To Get Complete Career Choice Report , You Need to go through Personality Test and Career Couselling.
               </h1>
               <br/><br/>
               <a class="btn btn-large" style="background-color:#03C; color:#FFF;" href="http://www.careerprism.in/personality-test">
               <b>Step 2 : Take Personality Test</b>
               </a>
               <br/>
               
		</div>
        
        
   <br/><br/><br/>
   <?php
   include('footer.php');
   ?>
	
	
    
    
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
<script>
var tooltipElement = $('<div class="ui-slider-tooltip" aria-hidden="true" />');
var tooltip;
var slider  = $('.slider > div').slider({
  range: "min",     
  value: 7,
  min: 1,
  max: 10,
  step: 1,
  create: function ( event ) {
    $( event.target ).find('.ui-slider-handle').append( tooltipElement );
    tooltip = $('.ui-slider-tooltip');
  },
  change: function ( event, ui ) {
    var input = $( event.target ).parent().find('input.answer');
    input.val( ui.value );
    window.tooltip.text( ui.value );
    window.tooltip.attr('aria-hidden', 'false');
  },
  slide: function ( event, ui ) {
    window.tooltip.attr('aria-hidden', 'true');
  }
});
</script>
	
</body>
</html>