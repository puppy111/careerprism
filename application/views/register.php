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
      <li>Register</li>
    </div>
  </div>
</div>


 <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Register to <b>careerprism.in</b></h4></a>.
              
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
                      <div class="well">
                          <?php echo form_open("register");?>
                          
                              <div class="form-group">
                                    <label style="color:#000;" class="control-label">Phone *</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Phone number"
                                    value="<?php echo set_value('phone'); ?>">
                                  <span class="help-block"></span>
                              </div>
                              
                              <div class="form-group">
                                    <label style="color:#000;" class="control-label" >CP ID ( Optional )</label>
                                    <input type="text" name="cp_id" class="form-control" placeholder="Student ID"
                                    value="<?php echo set_value('cp_id'); ?>">
                                  <span class="help-block"></span>
                              </div>
                              
                              <div class="form-group">
                                    <label style="color:#000;" class="control-label">Password *</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                                    value="<?php echo set_value('password'); ?>">
                                  <span class="help-block">Min 8 Chars</span>
                              </div>
                              
                              <div class="form-group">
                                    <label style="color:#000;" class="control-label">Confirm password *</label>
                                    <input type="password" name="password_confirm" class="form-control" id="password_confirm" 
                                    placeholder="Confirm password" value="<?php echo set_value('password_confirm'); ?>">
                                  <span class="help-block"></span>
                              </div>
                              
                              <button class="btn btn-success btn-block">Create an account</button>
                          </form>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-lg-6 col-md-6">
                      <p class="lead">Register now for <span class="text-success">FREE</span></p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> Register for free</li>
                          <li><span class="fa fa-check text-success"></span> Complete Your Personal profile</li>
                          <li><span class="fa fa-check text-success"></span> Take Aptitude Test </li>
                          <li><span class="fa fa-check text-success"></span> Take Personality Test </li>
                          <li><span class="fa fa-check text-success"></span> Save Your Career Report </li>
                          <li><span class="fa fa-check text-success"></span> Get Career Guidance From Experts </li>
                      </ul>
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