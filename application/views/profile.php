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

<body>
<?php include('menu.php'); ?>
<div id="breadcrumb">
  <div class="container">
    <div class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li>Profile</li>
    </div>
  </div>
</div>

    
<section id="contact-page">
  <div class="container">
    <div class="center">
      <h2>PERSONAL DETAILS</h2>
    </div>
    <div class="row contact-wrap">
    
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
    
    <?php
	if(!isset($std_data))
	{
        $std_data['first_name'] = false;
		$std_data['last_name']= false;
		$std_data['parent_phone']= false;
		$std_data['email']= false;
		$std_data['class']= false;
		$std_data['school']= false;
	}
	//echo '<pre>';print_r($std_data);echo '</pre>';
	$fname 	= $std_data['first_name'] == true ? $std_data['first_name'] : set_value('fname'); 
	$lname 	= $std_data['last_name'] == true ?  $std_data['last_name']: set_value('lname'); 
	$parent_phone    = $std_data['parent_phone'] == true ?  $std_data['parent_phone']: set_value('parent_phone'); 
	$email    = $std_data['email'] == true ?  $std_data['email']: set_value('email'); 
	$class    = $std_data['class'] == true ?  $std_data['class']: set_value('class'); 
	$school    = $std_data['school'] == true ?  $std_data['school']: set_value('school'); 
    ?>		
   <?php	
	//echo '<span style="color:black">'.$phone.'------'.'</span>';
   ?>
    
    <?php echo form_open("profile");?>
    <div class="col-sm-5 col-sm-offset-1" style="color:#000;">
      <div class="form-group">
        <label style="color:#000;">FIRST NAME *</label>
        <input type="text" name="fname" class="form-control" placeholder="FIRST NAME" value="<?php echo $fname; ?>">
      </div>
      
      <div class="form-group">
        <label style="color:#000;">LAST NAME *</label>
        <input type="text" name="lname" class="form-control" placeholder="LAST NAME" value="<?php echo $lname; ?>">
      </div>
      
      <div class="form-group">
        <label style="color:#000;">CLASS. *</label>
        <input type="text" name="class" class="form-control" id="class" placeholder="CLASS" value="<?php echo $class; ?>">
      </div>
      
      <div class="form-group">
        <label style="color:#000;">SCHOOL / COLLEGE NAME *</label>
        <input type="text" name="school" class="form-control" id="school" placeholder="SCHOOL NAME" value="<?php echo $school; ?>">
      </div>
      
      <div class="form-group">
        <label style="color:#000;">PARENT PHONE NO. *</label>
        <input type="text" name="parent_phone" class="form-control" id="phone" placeholder="PARENT PHONE NUMBER" value="<?php echo $parent_phone; ?>">
      </div>
      
      <div class="form-group">
        <label style="color:#000;">EMAIL ID </label>
        <input type="email" name="email" class="form-control" id="email" placeholder="EMAIL ID" value="<?php echo $email; ?>">
      </div>
      
      <div class="form-group">
        <button class="btn btn-primary btn-lg">UPDATE</button>
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