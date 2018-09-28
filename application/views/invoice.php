<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Careerism Invoice</title>
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

<!---------slider--------->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/slider.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/jquery-ui.css">
<script src="<?php echo base_url(); ?>assets/template/js/prefixfree.min.js"></script>
<!---------slider--//------->

<style type="text/css" media="print">
@media print {
footer {
	visibility: hidden;
}
#breadcrumb {
	visibility: hidden;
}
#print, #bubble-image {
	visibility: hidden;
}
#print, #couselling {
	visibility: hidden;
}
.gallery bottom right {
	visibility: hidden;
}
}
</style>
</head>
<style>
.container .text-center {
	margin-top: 2%;
}
</style>
<body>
<?php include('menu.php'); ?>
<div id="breadcrumb">
  <div class="container">
    <div class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>">Home</a></li>
      <li>Result Report</li>
    </div>
  </div>
</div>

<!--/#main-slider-->

<div class="container" style="color:#000; font-weight:bold;"> <img src="http://www.careerprism.in/assets/template/images/logo.jpg" />
  <h1 style="color:#900; font-weight:bold;">
    <input type="button"  class="primary" id="print" value="Print" onclick="PrintDiv();" />
  </h1>
  <br/>
  <span style="color:#009;">PERSONAL DETIALS</span>
  <table class="table table-hover">
    <thead>
    </thead>
    <tbody>
      <tr>
        <th>Student ID</th>
        <th><?php echo 'CIDS-0'.$this->session->userdata('user_id'); ?></th>
      </tr>
      <tr>
        <th>Name</th>
        <th> <?php echo $user_data[0]['first_name'].' '.$user_data[0]['last_name']; 
				//echo '<pre>';print_r($user_data); 
				?> </th>
      </tr>
      <tr>
        <th>Email</th>
        <th> <?php echo $this->session->userdata('email'); ?> </th>
      </tr>
    </tbody>
  </table>
  <?php
		if($aptitude_result)
		{
			//echo '<pre>';print_r($aptitude_result['0']);echo '</pre>'; 
			//echo '<pre>';print_r(json_decode($aptitude_result['0']['result'],true));echo '</pre>'; 
			$aptitude_result1 = json_decode($aptitude_result['0']['result'],true);
		?>
  <span style="color:#009;">APTITUDE TEST</span>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Course</th>
      </tr>
    </thead>
    <tbody>
      <?php
		   $i=1;
		   foreach($aptitude_result1 as $k => $v)
		   {
		   ?>
      <tr>
        <td><?=$i?></td>
        <td><?=$k?></td>
        <?php
				foreach($v as $k1=>$v1)
				{
					$course[$k1] = $v1;
				}
				?>
        <td><?php echo implode("/", array_unique($course)); ?>
          <?php //echo implode("<br/>", array_unique($course)); ?></td>
      </tr>
      <?php
			$i++;
            }
            ?>
    </tbody>
  </table>
  <?php	
		}
		if($personality_result)
		{
			//echo '<pre>';print_r($personality_result['0']);echo '</pre>'; 
			//echo '<pre>';print_r(json_decode($personality_result['0']['result'],true));echo '</pre>'; 
			$personality_result1 = json_decode($personality_result['0']['result'],true);
		}
		?>
  <span style="color:#009;">PERSONALITY TEST</span>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Value</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $i=1;
        foreach($personality_result1 as $k => $v)
        {
        ?>
      <tr>
        <td><?=$i?></td>
        <td><?=$k?></td>
        <td><?=$v?></td>
        <?php
        $i++;
        }
        ?>
    </tbody>
  </table>
  <div class="col-lg-12">
    <div class="well" style="background-color:#e6e6e6;">
      <p> <b style="color:#2d7da4;"> Extroversion (E) </b> is the personality trait of seeking fulfillment from sources outside the self or in community.
        High scorers tend to be very social while low scorers prefer to work on their projects alone. </p>
      <p> <b style="color:#6aa42f;"> Agreeableness (A) </b> reflects much individuals adjust their behavior to suit others.
        High Scores are typically polite and like people. Low scorers tend to 'tell it like is.' </p>
      <p> <b style="color:#ffcc33;"> Conscientiousness(C)</b> is the personality trait of being honest and hardworking.
        High scores tend to follow rules and prefer clean homes. Low scorers may be messy and cheat others. </p>
      <p> <b style="color:#db3615;"> Neuroticism(N) </b> is the personality trait of being emotional </p>
      <p> <b style="color:#38cbcb;"> Openness to Experience (O) </b> is the personality trait of seeking new experience and intellectual pursuits.
        High Scores may dream a lot. Low scores may be very down to earth. </p>
    </div>
  </div>
  <br/>
  <br/>
  <div class="col-lg-12" id="couselling"> <br/>
    <br/>
    <h1 style="color:#900; font-weight:bold;">Get Counseling From Experts</h1>
    <a class="btn btn-large" style="background-color:#03C; color:#FFF;" href="http://www.careerprism.in/counseling-session"> <b>Career Report</b> </a> <br/>
  </div>
</div>
<br/>
<br/>
<br/>
<?php
include('footer.php');
?>
</body>
</html>