<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ADMIN DASHBOARD</title>
<!----------------PAGE LEVEL STYLES------------------------------->
<link href="<?php echo ASSETS_ADMIN_PATH ;?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo ASSETS_ADMIN_PATH ;?>css/bootstrap-table.css" rel="stylesheet">
<link href="<?php echo ASSETS_ADMIN_PATH ;?>css/styles.css" rel="stylesheet">
<!--Icons-->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<!----------------PAGE LEVEL STYLES ///--------------------------->
</head>
<body>
<?php
include('left.php');
?>	
	
    
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li>
                <a href="#">
				<svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg>
                </a>
                </li>
				<li class="active">Vendor</li>
			</ol>
		</div><!--/.row-->
		
		<!--/.row-->	
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Vendor Details</div>
                    
                    <div class="container">
                    <a href="add-student.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Records</a>
                    </div>


					<div class="panel-body">
                    <table class='table table-bordered table-responsive'>
                    <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>E-mail</th>
                    <th>Contact</th>
                    <th>City</th>
                    <th>Address</th>
                    <th colspan="2" align="center">Actions</th>
                    </tr>
                    
                    </td>
                    </tr>
                    </table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
	</div><!--/.main-->
    
    <!----------------PAGE LEVEL SCRIPTS--------------------------------->
	<script src="<?php echo ASSETS_ADMIN_PATH ;?>js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo ASSETS_ADMIN_PATH ;?>js/bootstrap-table.js"></script>
    <!----------------PAGE LEVEL SCRIPTS--------------------------------->
    
    <!----------------PAGE COMMON SCRIPTS------------------------------->
	<script src="<?php echo ASSETS_ADMIN_PATH ;?>js/bootstrap.min.js"></script>
	<script src="<?php echo ASSETS_ADMIN_PATH ;?>js/chart.min.js"></script>
	<script src="<?php echo ASSETS_ADMIN_PATH ;?>js/chart-data.js"></script>
	<script src="<?php echo ASSETS_ADMIN_PATH ;?>js/easypiechart.js"></script>
	<script src="<?php echo ASSETS_ADMIN_PATH ;?>js/easypiechart-data.js"></script>
    <script src="<?php echo ASSETS_ADMIN_PATH ;?>js/lumino.glyphs.js"></script>
    <!----------------PAGE COMMON SCRIPTS--//----------------------------->  
    
</body>
</html>
