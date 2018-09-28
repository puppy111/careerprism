<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Careerprism Apply</title>

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
      <li>Apply</li>
    </div>
  </div>
</div>
<section id="contact-page">
  <div class="container">
    <p><?php echo validation_errors(); ?></p>
    <div class="center">
      <h2><small>Contact Us Through Email - satya@aamits.com</small> </h2>
    </div>
    <div class="row contact-wrap">
      <div class="status alert alert-success" style="display: none"></div>
      <form id="main-contact-form" class="contact-form" 
      name="contact-form" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>apply">
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
            <input type="text" name="phone" <?php echo set_value('phone'); ?> class="form-control">
          </div>
          <div class="form-group">
              <label>Upload *</label>
              <input type="file" name="file" class="form-control" /> 
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
            <input type="submit" name="submit" class="btn btn-primary btn-lg" value="submit">
          </div>
        </div>
      </form>
    </div>
    <!--/.row--> 
  </div>
  <!--/.container--> 
</section>
<!--/#contact-page-->

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