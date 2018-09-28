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
 
 
<?php

//echo '<pre>'; print_r($res['0']); echo '</pre>';
//echo '<pre>'; print_r($res['0']['profile_completion']); echo '----</pre>';
//echo '<pre>'; print_r($res['0']['aptitude_test']); echo '</pre>';
//echo '<pre>'; print_r($res['0']['personality_test']); echo '</pre>';
//echo '<pre>'; print_r($res['0']['counseling']); echo '</pre>';

	
error_reporting(0);
$profile_link    	    = '#';
$aptitude_link    	   = '#';
$personality_link  		= '#';
$invoice_link      		= '#';
$counseling_link  		 = '#';


/*$res['0']['aptitude_test'] = '';
$res['0']['personality_test'] = '';
$res['0']['invoice'] = '';*/
								
if(isset($res['0']))
{
$aptitude_link    = ($res['0']['profile_completion'] == 1 ? 'http://www.careerprism.in/aptitude/instructions' : '#'); 
$personality_link = ($res['0']['aptitude_test'] == 1 ? 'http://www.careerprism.in/personality/instructions' : '#'); 
$counseling_link  = ($res['0']['personality_test'] == 1 ? 'http://www.careerprism.in/counseling-session' : '#'); 
$invoice_link     = ((($res['0']['profile_completion'] == 1) & $res['0']['aptitude_test'] == 1) & ($res['0']['personality_test'] == 1)? 'http://www.careerprism.in/invoice' : '#');
}

//echo $aptitude_link.'-------------';

// TEST CASES TO DISPLAY IMAGES

// STEP 1 ENTER PROFILE 
if((isset($res['0']['profile_completion']) == 0) & (isset($res['0']['aptitude_test']) == 0) & ($res['0']['personality_test'] == 0) & 
($res['0']['invoice']  == 0))
{
$profile_status_link = "<img src=http://www.careerprism.in/assets/template/images/hand.gif width='150px' height='100px' /><br/><br/><br/>";
$aptitude_status_link = "<img src=http://www.careerprism.in/assets/template/images/process_pending.png><br/><br/><br/><br/><br/>";
$personality_status_link = "<img src=http://www.careerprism.in/assets/template/images/process_pending.png><br/><br/><br/><br/><br/><br/>";
$invoice_status_link = "<img src='http://www.careerprism.in/assets/template/images/process_pending.png'><br/><br/><br/>";
$counseling_status_link = "<img src='http://www.careerprism.in/assets/template/images/process_pending.png'>";
}

// STEP 2 ENTER APTITUDE TEST 
if(($res['0']['profile_completion'] == 1) & ($res['0']['aptitude_test'] == 0) & ($res['0']['personality_test'] == 0) & ($res['0']['invoice'] == 0) )
{
$profile_status_link = "<img src=http://www.careerprism.in/assets/template/images/process_complete.png /><br/><br/><br/>";
$aptitude_status_link = "<img src=http://www.careerprism.in/assets/template/images/hand.gif width='150px' height='130px'/><br/><br/><br/>";
$personality_status_link = "<img src=http://www.careerprism.in/assets/template/images/process_pending.png><br/><br/><br/><br/><br/><br/>";
$invoice_status_link = "<img src='http://www.careerprism.in/assets/template/images/process_pending.png'><br/><br/><br/><br/>";
$counseling_status_link = "<img src='http://www.careerprism.in/assets/template/images/process_pending.png'>";
}


// STEP 3 PERSONALITY TEST 
if(($res['0']['profile_completion'] == 1) & ($res['0']['aptitude_test'] == 1) & ($res['0']['personality_test'] == 0) & ($res['0']['invoice'] == 0) )
{
$profile_status_link = "<img src=http://www.careerprism.in/assets/template/images/process_complete.png /><br/><br/><br/>";
$aptitude_status_link = "<img src=http://www.careerprism.in/assets/template/images/process_complete.png /><br/><br/><br/><br/><br/>";
$personality_status_link = "<img src=http://www.careerprism.in/assets/template/images/hand.gif width='150px' height='130px' /><br/><br/><br/><br/><br/>";
$invoice_status_link = "<img src='http://www.careerprism.in/assets/template/images/process_pending.png' /><br/><br/><br/>";
$counseling_status_link = "<img src='http://www.careerprism.in/assets/template/images/process_pending.png'>";
}


// STEP 4 PERSONALITY TEST 
if(($res['0']['profile_completion'] == 1) & ($res['0']['aptitude_test'] == 1) & ($res['0']['personality_test'] == 1) & ($res['0']['invoice'] == 0) )
{
$profile_status_link = "<img src=http://www.careerprism.in/assets/template/images/process_complete.png /><br/><br/><br/><br/>";
$aptitude_status_link = "<img src=http://www.careerprism.in/assets/template/images/process_complete.png /><br/><br/><br/><br/><br/>";
$personality_status_link = "<img src=http://www.careerprism.in/assets/template/images/process_complete.png /><br/><br/><br/><br/><br/>";
$invoice_status_link = "<img src=http://www.careerprism.in/assets/template/images/hand.gif width='150px' height='130px' /><br/><br/>";
$counseling_status_link = "<img src='http://www.careerprism.in/assets/template/images/process_pending.png'>";
}


// STEP 5 INVOICE TEST 
if(($res['0']['profile_completion'] == 1) & ($res['0']['aptitude_test'] == 1) & ($res['0']['personality_test'] == 1) & ($res['0']['invoice'] == 1) )
{
$profile_status_link = "<img src=http://www.careerprism.in/assets/template/images/process_complete.png /><br/><br/><br/><br/>";
$aptitude_status_link = "<img src=http://www.careerprism.in/assets/template/images/process_complete.png /><br/><br/><br/><br/><br/>";
$personality_status_link = "<img src=http://www.careerprism.in/assets/template/images/process_complete.png /><br/><br/><br/><br/><br/><br/><br/>";
$invoice_status_link = "<img src=http://www.careerprism.in/assets/template/images/process_complete.png /><br/><br/><br/>";
$counseling_status_link = "<img src='http://www.careerprism.in/assets/template/images/hand.gif' width='150px' height='130px' /><br/><br/>";
}

//-------------------------------------------------------//
?>
            
            <div class="col-md-6">
				<div class="media">
					<ul>

                        <li>
							<div class="media-left">
								<i class="fa fa-pencil"></i>						
							</div>
							<div class="media-body">
								<h4 class="media-heading">
                                <a href="http://www.careerprism.in/profile">
                                 Step 1: COMPLETE YOUR PROFILE
                                </a>
                                </h4>
								<p>
                                Please complete your profile to generate report<br/>
                                </p>
                                <br/><br/>
							</div>
						</li>  
                                          
						<li>
							<div class="media-left">
								<i class="fa fa-pencil"></i>						
							</div>
							<div class="media-body">
								<h4 class="media-heading">
                                 <a href="<?=$aptitude_link?>">
                               Step 2: APTITUDE TEST
                                </a>
                                </h4>
								<p>
                                This Is A Simple Questionnaire, give Responses Accordingly What Comes To Your Mind First. <br/>
                                Don\'t Think Too Much On Any Question. Be True To Yourself.<br/>
                                It consists of 42 questionnaire<br/>
                                </p>
							</div>
						</li>
                        
						<li>
							<div class="media-left">
								<i class="fa fa-pencil"></i>						
							</div>
							<div class="media-body">
								<h4 class="media-heading">

                                <a href="<?=$personality_link?>">
                                Step 3: PERSONALITY TEST
                                </a>
                                </h4>
								<p>This Is A Simple Personality Test, It Will Help You Understand Why You Act The Way 
                                That You Do And How Your Personality Is Structured. 
                                Read the Instructions And Start Giving Your Opinions Whole Heartedly.
                                <br/> 
								It consists of 50 questionnaire</p>
							</div>
						</li>
                        
						  <br/>
                          
                          <li>
							<div class="media-left">
                            <i class="fa fa-download"></i>
							</div>
							<div class="media-body">
                                <h4 class="media-heading">
                                <a href="<?=$invoice_link?>">
								GET RESULT REPORT
                                </a>
                                </h4>
								<p>
                                 After completing all the above steps a detailed report will be generated.
                                </p>
							</div>
						</li>
                        
                          <br/>
                        
                          <li>
							<div class="media-left">
								<i class="fa fa-pencil"></i>							
							</div>
							<div class="media-body">
                                <h4 class="media-heading">
                                <a href="<?=$counseling_link?>">
								Step 4: COUNSELING SESSION
                                </a>
                                </h4>
								<p>
                                After completing both aptitude and personality test a 
                                couselling session will be conducted by our Panel of expert team.
                                </p>
							</div>
						</li>
                        
					</ul>
				</div>
			</div>
            
			<div class="col-md-6">
                   <div class="media">
					<ul>
                    
                       <li>
							<div class="media-left">
								<?=$profile_status_link;?>
							</div>
						</li>
                        
                        
						<li>
							<div class="media-left">
								<?=$aptitude_status_link;?>
							</div>
						</li>
                        
						<li>
							<div class="media-left">
                                <?=$personality_status_link;?>
							</div>
						</li>
						
                        <li>
							<div class="media-left">
								 <?=$invoice_status_link;?>				
							</div>
						</li>
                        
                        <li>
							<div class="media-left">
								<?=$counseling_status_link;?>
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