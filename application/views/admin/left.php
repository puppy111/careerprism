<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>career &nbsp; prism </span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> 
                        <?php echo 'Hi : <br/>' .$this->session->userdata('email');  ?>
                        <span class="caret"></span>
                        </a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="<?php echo BASE_URL ;?>admin/auth/logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
		  </div>
	</div><!-- /.container-fluid -->
</nav>

<br/><br/>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

       <br/><br/>
        
        <ul class="sub­nav" >

		<?php
        $menu_param = current_url();
        $name_array = explode('/',$menu_param);
        $count = count($name_array);
        $page_name = $name_array[4];
		//echo '<pre>';print_r($name_array);echo '</pre>';
		//echo $page_name.'--------';		
        ?>
       
        
        
		<ul class="nav menu">
			<li class="<?php echo ($page_name=='dashboard')?'active':'';?>" >
            <a href="<?php echo BASE_URL ;?>admin/dashboard">
            <svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use>
            </svg> Dashboard
            </a>
            </li>
            
			<li class="<?php echo ($page_name=='users')?'active':'';?>" >
            <a href="<?php echo BASE_URL ;?>admin/users">
            <svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use>
            </svg>USERS
            </a>
            </li>
        
           
			
			<li class="<?php echo ($page_name=='result')?'active':'';?>">
            <a  href="<?php echo BASE_URL ;?>admin/result">
            <svg class="glyph stroked table"><use xlink:href="#stroked-table"></use>
            </svg>TEST RESULTS
            </a>
            </li>
            
		
            
			<li class="<?php echo ($page_name=='test')?'active':'';?>">
            <a  href="<?php echo BASE_URL ;?>admin/test">
            <svg class="glyph stroked table"><use xlink:href="#stroked-table"></use>
            </svg>TEST 	QUESTIONS
            </a>
            </li>
            
            <li class="<?php echo ($page_name=='stream')?'active':'';?>">
            <a  href="<?php echo BASE_URL ;?>admin/stream">
            <svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use>
            </svg>STREAMS
            </a>
            </li>
            
          
			<li class="<?php echo ($page_name=='sms')?'active':'';?>">
            <a  href="<?php echo BASE_URL ;?>admin/sms">
            <svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use>
            </svg>SMS</a>
            </li>
            
            
			<li class="<?php echo ($page_name=='banner')?'active':'';?>">
            <a href="<?php echo BASE_URL ;?>admin/banner">
            <svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use>
            </svg> Banner
            </a>
            </li>
            
            
			<li role="presentation" class="divider"></li>
			<li>
            <a href="<?php echo BASE_URL ;?>admin/auth/logout">
            <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use>
            </svg> Logout</a>
            </li>
            
		</ul>

	</div><!--/.sidebar-->