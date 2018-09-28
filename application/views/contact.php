<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Careerprism Contact Us</title>

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
	
    <?php include('menu.php'); ?>
	
	<div id="breadcrumb">
		<div class="container">	
			<div class="breadcrumb">							
				<li><a href="/">Home</a></li>
				<li>Contact</li>			
			</div>		
		</div>	
	</div>
	
	<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4538.14157971985!2d82.2363337127111!3d16.96928700728713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a38286cecf40443%3A0x3ebcf7a8d6bae9e!2sChaithanyam+Institute+of+Development!5e0!3m2!1sen!2sin!4v1465390851708" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	
	
	
	<section id="contact-page">
        <div class="container">
		
		<p><?php echo validation_errors(); ?></p>
		
            <div class="center">   		
                <h2>Contact Us Through Email</h2>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="<?php echo base_url(); ?>contact">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" name="name" <?php echo set_value('name'); ?> class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" <?php echo set_value('email'); ?> class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" name="phone" <?php echo set_value('phone'); ?> class="form-control">
                        </div>                                        
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Subject *</label>
                            <input type="text" name="subject" <?php echo set_value('subject'); ?> class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Message *</label>
                            <textarea name="message" id="message" class="form-control" rows="8"><?php echo set_value('message'); ?></textarea>
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
						<input type="text" autocomplete="off" class="form-control" name="userCaptcha" placeholder="Enter above text" value="<?php if(!empty($userCaptcha))
						{ echo $userCaptcha;} ?>" />
						<span class="required-server"><?php echo form_error('userCaptcha','<p style="color:#F83A18">','</p>'); ?></span> 
						</div>

                        
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit Message</button>
                        </div>
                    </div>
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->
	
   <?php
   include('footer.php');
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

<!-- Modal HTML -->

</body>
</html>