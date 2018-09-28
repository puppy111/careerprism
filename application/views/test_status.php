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
    <title>Careerism Result</title>
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
	
	@media print 
	{
    	footer { visibility: hidden; }
		#breadcrumb { visibility: hidden; }
		#print { visibility: hidden; }
    }
    </style>

  </head>
  <style>
  .container .text-center{ margin-top:2%; }
  </style>
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
    	
		<div class="container" style="color:#000; font-weight:bold;">
		<br/>
		<?php echo $test_status; ?>
		<br/>
        
        <?php
		if(isset($aptitude_result))
		{
			//echo '<pre>';print_r($aptitude_result['0']);echo '</pre>'; 
			//echo '<pre>';print_r(json_decode($aptitude_result['0']['result'],true));echo '</pre>'; 
			$aptitude_result1 = json_decode($aptitude_result['0']['result'],true);
		?>
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
                <td>
                <?php echo implode("/", array_unique($course)); ?>
				<?php //echo implode("<br/>", array_unique($course)); ?>
                </td>
            </tr>
			<?php
			$i++;
            }
            ?>
        </tbody>
    </table>
        <?php	
		}
		if(isset($personality_result))
		{
			//echo '<pre>';print_r($personality_result['0']);echo '</pre>'; 
			//echo '<pre>';print_r(json_decode($personality_result['0']['result'],true));echo '</pre>'; 
			$personality_result1 = json_decode($personality_result['0']['result'],true);
		
		?>
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
		}
		if(isset($personality_result1))
		{
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
		}
        ?>
        </tbody>
        </table>
		</div>
        
        
   <br/><br/><br/>
   <?php
   include('footer.php');
   ?>
    
</body>
</html>