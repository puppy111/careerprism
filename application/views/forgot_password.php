<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Forgot Password</title>
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
<body>
<?php include('menu.php'); ?>

<div id="breadcrumb">
  <div class="container">
    <div class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>">Home</a></li>
      <li>Forgot Password</li>
    </div>
  </div>
</div>

    <!-- Mobile menu overlay mask -->    
    	<div class="container">
        	<div class="row">
            	<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                	<div id="login">
                           <div id="infoMessage"><?php echo $message;?></div>
                             <?php echo form_open("auth/forgot_password");?>
                                <div class="form-group">
                                    <label style="color:#000;">Email Id</label>
									<input type="email" class="form-control" id="identity" placeholder="identity" name="identity">
                                </div>
                                <input type="submit" name="submit" value="Submit" style="color:#FFF; background-color:#0CC;" />
                                <br/>
                              <?php echo form_close();?>
                        </div>
                </div>
            </div>
        </div>

<?php include ('footer.php') ; ?><!-- End footer -->
 <!-- Common scripts -->
<script src="<?=base_url();?>assets/js/jquery-1.11.2.min.js"></script>
</html>