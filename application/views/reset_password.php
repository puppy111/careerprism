<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	
<!--<![endif]-->

<html> 

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="Tetra Tours Reset Password">
    <meta name="author" content="Tetra Tours">
    <title>Tetra Tours - Reset Password</title>
    
    <!-- Favicons-->
    <link rel="icon" href="<?php echo base_url();?>assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- CSS -->
    <link href="<?=base_url();?>assets/css/base.css" rel="stylesheet">
    
    
    <!-- Google web fonts -->
   <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
   <link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
   <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
    
    <!--[if lt IE 9]>
      <script src="<?=base_url();?>assets/js/html5shiv.min.js"></script>
      <script src="<?=base_url();?>assets/js/respond.min.js"></script>
    <![endif]-->
        
</head>
<body>


    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

  <?php include('header.php'); ?> 
    
    <section id="hero" class="login">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                	<div id="login">
                            <?php echo lang('reset_password_heading');?>
                    		<div class="text-center">
                            <img src="<?php echo base_url();?>assets/img/logo_sticky.png" alt="Image" data-retina="true" >
                             <div id="infoMessage" style="color:red; text-align:left;"><?php echo $message;?></div>
                            </div>
                               <?php echo form_open('auth/reset_password/' . $code);?>
									<div class="form-group">
                                    <p>
                                    <label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
                                    <?php echo form_input($new_password);?>
                                    </p>
									</div>
									<div class="form-group">
                                    <p>
                                    <?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
                                    <?php echo form_input($new_password_confirm);?>
                                    </p>
									</div>
                                    <div class="form-group">
									<?php echo form_input($user_id);?>
                                    <?php echo form_hidden($csrf); ?>
                                    </div>
									<p><?php echo form_submit('submit', lang('reset_password_submit_btn'));?></p>
								    <?php echo form_close();?>
                        </div>
                </div>
            </div>
        </div>
    </section>

<?php include ('footer.php') ; ?><!-- End footer -->

<div id="toTop"></div><!-- Back to top button -->

 <!-- Common scripts -->
<script src="<?=base_url();?>assets/js/jquery-1.11.2.min.js"></script>
 <!-- Specific scripts -->
</html>