<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Careerism Conselling</title>
<!-- Bootstrap -->
<link href="<?php echo base_url(); ?>assets/template/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/font-awesome.min.css">
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
<?php include('menu.php'); ?>
<div id="breadcrumb">
  <div class="container">
    <div class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li>Counseling SESSION</li>
    </div>
  </div>
</div>

<div class="container" style="color:#000; font-weight:bold;">
  
  <section id="contact-page">
        <div class="container">       
            <div class="row contact-wrap"> 
                <form method="post" action="<?php echo base_url(); ?>counseling-session">
                    <div class="col-sm-5 col-sm-offset-1">
                        <?php echo validation_errors(); ?>
					    <p style="color:#C30;">Please Enter Details for taking career counseling.</p>
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control">
                        </div>
						
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control">
                        </div>
						
                        <div class="form-group">
                            <label>Phone*</label>
                            <input type="number" name="phone" value="<?php echo set_value('phone'); ?>" class="form-control">
                        </div>
						
                        <div class="form-group">
                            <label>Location For Counselling*</label>
                            <input type="text" name="location" value="<?php echo set_value('location'); ?>" class="form-control">
                        </div>
						
						<div class="form-group">
						<label for="captcha">
						<?php 
						if(!empty($captcha['image']))
						{ 
							echo $captcha['image'] ;
						}; 
						?>
						</label>
						<br>
						<input type="text" autocomplete="off" name="userCaptcha" placeholder="Enter above text" value="<?php if(!empty($userCaptcha))
						{ echo $userCaptcha;} ?>" />
						<span class="required-server"><?php echo form_error('userCaptcha','<p style="color:#F83A18">','</p>'); ?></span> 
						</div>
						
						<div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
						</div> 
						
                    </div>                   
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->	
	
</div>
<?php
include('footer.php');
?>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</body>
</html>


