<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Careerprism Panel Of experts</title>
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
	<style type="text/css">
	/* Global */
	img { max-width:100%; }
	
	a {
	-webkit-transition: all 150ms ease;
	-moz-transition: all 150ms ease;
	-ms-transition: all 150ms ease;
	-o-transition: all 150ms ease;
	transition: all 150ms ease; 
	}
	
	a:hover {
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)"; /* IE 8 */
	filter: alpha(opacity=50); /* IE7 */
	opacity: 0.6;
	text-decoration: none;
	}
	
	.thumbnails li> .fff .caption { 
	background:#fff !important; 
	padding:10px
	}
	
	/* Page Header */
	.page-header {
	background: #f9f9f9;
	margin: -30px -40px 40px;
	padding: 20px 40px;
	border-top: 4px solid #ccc;
	color: #999;
	text-transform: uppercase;
	}
	
	.page-header h3 {
	line-height: 0.88rem;
	color: #000;
	}
	
	ul.thumbnails { 
	margin-bottom: 0px;
	}
	
	/* Thumbnail Box */
	.caption h4 {
	color: #444;
	}
	
	.caption p {  
	color: #999;
	}
	
	/* Carousel Control */
	.control-box {
	text-align: right;
	width: 100%;
	}
	.carousel-control{
	background: #666;
	border: 0px;
	border-radius: 0px;
	display: inline-block;
	font-size: 34px;
	font-weight: 200;
	line-height: 18px;
	opacity: 0.5;
	padding: 4px 10px 0px;
	position: static;
	height: 30px;
	width: 15px;
	}
	
	/* Mobile Only */
	@media (max-width: 767px) {
	.page-header, .control-box {
	text-align: center;
	} 
	}
	@media (max-width: 479px) {
	.caption {
	word-break: break-all;
	}
	}
	
	li { list-style-type:none;}
	
	::selection { background: #ff5e99; color: #FFFFFF; text-shadow: 0; }
	::-moz-selection { background: #ff5e99; color: #FFFFFF; }

    </style>
  </head>
  
  <body>
	<?php include('menu.php'); ?>
	
	<div id="breadcrumb">
		<div class="container">	
			<div class="breadcrumb">							
				<li><a href="/">Home</a></li>
				<li>Panel Of Experts</li>			
			</div>		
		</div>	
	</div>
	
	<section id="portfolio">	
        <div class="container">
            <div class="center">
               <p>Panel Of Experts</p>
            </div>

           <div class="carousel slide" id="myCarousel">
        <div class="carousel-inner">
            <div class="item active">
                    <ul class="thumbnails">
                        <li class="col-sm-3">
    						<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="<?php echo base_url(); ?>assets/template/experts/d.jpg" alt=""></a>
								</div>
								<div class="caption">
									<h4>Doctor</h4>
								</div>
                            </div>
                        </li>
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="<?php echo base_url(); ?>assets/template/experts/e.jpg" alt=""></a>
								</div>
								<div class="caption">
									<h4>Engineer</h4>
								</div>
                            </div>
                        </li>
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="<?php echo base_url(); ?>assets/template/experts/f.jpg" alt=""></a>
								</div>
								<div class="caption">
									<h4>Filmstar</h4>
								</div>
                            </div>
                        </li>
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="<?php echo base_url(); ?>assets/template/experts/p.jpg" alt=""></a>
								</div>
								<div class="caption">
									<h4>Pilot</h4>
								</div>
                            </div>
                        </li>
                    </ul>
              </div><!-- /Slide1 --> 
            <div class="item">
                    <ul class="thumbnails">
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="<?php echo base_url(); ?>assets/template/experts/s.jpg" alt=""></a>
								</div>
								<div class="caption">
									<h4>Software</h4>
								</div>
                            </div>
                        </li>
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="<?php echo base_url(); ?>assets/template/experts/t.jpg" alt=""></a>
								</div>
								<div class="caption">
									<h4>Teacher</h4>
								</div>
                            </div>
                        </li>
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="<?php echo base_url(); ?>assets/template/experts/photog.jpg" alt=""></a>
								</div>
								<div class="caption">
									<h4>PhotoGrapher</h4>
								</div>
                            </div>
                        </li>
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="<?php echo base_url(); ?>assets/template/experts/chef.jpg" alt=""></a>
								</div>
								<div class="caption">
									<h4>Chef</h4>
								</div>
                            </div>
                        </li>
                    </ul>
              </div>
              <!-- /Slide2 --> 
            <!-- /Slide3 --> 
            
            <div class="item">
                    <ul class="thumbnails">
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="<?php echo base_url(); ?>assets/template/experts/business.jpg" alt=""></a>
								</div>
								<div class="caption">
									<h4>Business Man</h4>
								</div>
                            </div>
                        </li>
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="<?php echo base_url(); ?>assets/template/experts/music.jpg" alt=""></a>
								</div>
								<div class="caption">
									<h4>Musician</h4>
								</div>
                            </div>
                        </li>
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="<?php echo base_url(); ?>assets/template/experts/player.jpg" alt=""></a>
								</div>
								<div class="caption">
									<h4>Player</h4>
								</div>
                            </div>
                        </li>
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="<?php echo base_url(); ?>assets/template/experts/make-up.jpg" alt=""></a>
								</div>
								<div class="caption">
									<h4>Make Up Artist</h4>
								</div>
                            </div>
                        </li>
                    </ul>
              </div>
        </div>
        
       
	   <nav>
			<ul class="control-box pager">
				<li><a data-slide="prev" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>
				<li><a data-slide="next" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-right"></i></li>
			</ul>
		</nav>
	   <!-- /.control-box -->   
                              
    </div><!-- /#myCarousel -->
         
         
         
		</div>
		<div class="container">
            <div class="">
                <div class="portfolio-items">
                
                </div>
            </div>
        </div>
    </section><!--/#portfolio-item-->
	

   <?php
   include('footer.php');
   ?>
	
	<script src="<?php echo base_url(); ?>assets/template/js/jquery-2.1.1.min.js"></script>	
    <script src="<?php echo base_url(); ?>assets/template/js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
    // Carousel Auto-Cycle
  $(document).ready(function() {
    $('.carousel').carousel({
      interval: 6000
    })
  });

    </script>
    
    
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
    
</body>
</html>