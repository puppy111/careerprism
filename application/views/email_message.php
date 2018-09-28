<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Message</title>
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
      <li>Message</li>
    </div>
  </div>
</div>

<div class="container" style="color:#000; font-weight:bold;">
  
 	<?php
        echo $this->session->flashdata('item');
    ?>

</div>
<?php
include('footer.php');
?>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</body>
</html>


