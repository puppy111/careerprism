<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Careerism Instructions</title>
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
      <li><?php echo $link; ?></li>
    </div>
  </div>
</div>
<!--/#main-slider-->
<div class="container">
<!-- Jumbotron Header -->
<div class="jumbotron hero-spacer">
<p> <?php echo $data; ?> </p>
<p><a class="btn btn-primary btn-large" href="<?php echo base_url(); ?><?php echo $link; ?>"><?php echo $btntext; ?></a>
</p>
</div>
</div>

<?php
include('footer.php');
?>
   
</body>

<script>

speak('<?php echo $data; ?>');
// say a message
function speak(text, callback) 
{
    var u = new SpeechSynthesisUtterance();
    u.text = text;
    u.lang = 'en-US';
 
    u.onend = function () 
	{
        if (callback) 
		{
            callback();
        }
    };
 
    u.onerror = function (e) 
	{
        if (callback) {
            callback(e);
        }
    };
 
    speechSynthesis.speak(u);
}

</script>
</html> 