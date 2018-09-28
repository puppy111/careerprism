<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ADMIN SMS</title>
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
	

<div class="col-sm-6 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
<div class="row">
    <ol class="breadcrumb">
        <li>
        <a href="#">
        <svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg>
        </a>
        </li>
        <li class="active">Banner</li>
    </ol>
</div><!--/.row-->
    
<!--/.row-->	
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Banner</div>
            
            <div class="container">
            </div>


            <div class="panel-body">
            <form method='post'>
                <table class='table table-bordered table-responsive'>
                <tr>
                    <td>Title</td>
                    <td><input type='text' name='phone_number' class='form-control' required placeholder="Title"></td>
                </tr>
            
               <tr>
                    <td>Image</td>
                    <td>
                    <input type="file" class='form-control' name="banner" />
                    </td>
                </tr>
            
                <tr>
                    <td colspan="2">
                    <button type="submit" class="btn btn-primary" name="btn-save">
                    <span class="glyphicon glyphicon-plus"></span> Submit
                    </button>  
                    <a href="dashboard" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp;Back</a>
                    </td>
                </tr>
               </table>
              </form> 
            </div>
        </div>
    </div>
</div><!--/.row-->	
</div><!--/.main-->
    
    <script src="<?php echo ASSETS_ADMIN_PATH ;?>js/jquery-1.11.1.min.js"></script>
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

