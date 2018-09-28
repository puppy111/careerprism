<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Careerprism Register</title>

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

<body style="color:#000;">
<?php include('menu.php'); ?>
<div id="breadcrumb">
  <div class="container">
    <div class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li>Counsellors Register</li>
    </div>
  </div>
</div>
<div id="login-overlay" class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Register Counsellers to <b>careerprism.in</b></h4>
      </a>.
      <?php
                if(validation_errors() != false) 
                { 
					echo '<div class="status alert alert-danger">';
					echo "<div id='infoMessage'>";
					echo validation_errors();
					echo "</div>";
					echo "</div>";	
                }
                ?>
      <?php
                if ($this->session->flashdata('item')) 
                {
					echo '<div class="status alert alert-success">';
					echo "<div id='infoMessage'>";	
					echo $message = $this->session->flashdata('item');
					echo "</div>";
					echo "</div>";	
                }
                ?>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-lg-6 col-md-6">
          <div class="well"> <?php echo form_open("counseller/registration");?>
            <div class="form-group">
              <label style="color:#000;" class="control-label" >First Name</label>
              <input type="text" name="first_name" class="form-control" placeholder="First Name"
                                    value="<?php echo set_value('first_name'); ?>">
              <span class="help-block"></span> </div>
            <div class="form-group">
              <label style="color:#000;" class="control-label" >Last Name</label>
              <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                    value="<?php echo set_value('last_name'); ?>">
              <span class="help-block"></span> </div>
            <div class="form-group">
              <label style="color:#000;" class="control-label" >Email</label>
              <input type="text" name="email" class="form-control" placeholder="Email"
                                    value="<?php echo set_value('email'); ?>">
              <span class="help-block"></span> </div>
            <div class="form-group">
              <label style="color:#000;" class="control-label">Phone *</label>
              <input type="text" name="phone" class="form-control" placeholder="Phone number"
                                    value="<?php echo set_value('phone'); ?>">
              <span class="help-block"></span> </div>
            <div class="form-group">
              <label style="color:#000;" class="control-label" >Location</label>
              <input type="text" name="location" class="form-control" placeholder="Location"
                                    value="<?php echo set_value('location'); ?>">
              <span class="help-block"></span> </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-6 col-md-6">
          <div class="well">
            <div class="form-group">
              <label style="color:#000;" class="control-label" >Stream</label>
              <input type="text" name="stream" class="form-control" placeholder="Stream"
                                    value="<?php echo set_value('stream'); ?>">
              <span class="help-block"></span> </div>
            <div class="form-group">
              <label style="color:#000;" class="control-label" >Profession</label>
              <input type="text" name="profession" class="form-control" placeholder="Profession"
                                    value="<?php echo set_value('profession'); ?>">
              <span class="help-block"></span> </div>
            <div class="form-group">
              <label style="color:#000;" class="control-label">Password *</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                                    value="<?php echo set_value('password'); ?>">
              <span class="help-block">Min 8 Chars</span> </div>
            <div class="form-group">
              <label style="color:#000;" class="control-label">Confirm password *</label>
              <input type="password" name="password_confirm" class="form-control" id="password_confirm" 
                                    placeholder="Confirm password" value="<?php echo set_value('password_confirm'); ?>">
              <span class="help-block"></span> </div>
          </div>
          <button class="btn btn-success btn-block">Create an account</button>
          </form>
        </div>
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