<header>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="top_header">
      <div class="container">
        <div class="col-md-10">
          <div class="call-section"> <a href="tel:9885580777"><i class="fa fa-phone" aria-hidden="true"></i>Call us: 9885580777</a> </div>
          <div class="language-section">
            <div id="google_translate_element"></div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="social-icons">
            <ul>
              <?php /*?>
			  <li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
			  <?php */?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <div class="navbar-brand"> <a href="/">
            <h1> <span> <img src="<?php echo base_url(); ?>assets/template/images/logo.jpg" width="" height="60px"/> </span> </h1>
            </a> </div>
        </div>
        <style>
.goog-logo-link {
   display:none !important;
}
.goog-te-gadget{
   color: transparent !important;
}
.goog-te-gadget .goog-te-combo{
   color: blue !important;
}
</style>
<script type="text/javascript">
/*function googleTranslateElementInit() 
{
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'bn,en,gu,hi,kn,ml,mr,ne,pa,ta,te,ur'}, 'google_translate_element');
}*/
</script>
        <?php
$full_name  = $_SERVER['REQUEST_URI'];
$page_name  = str_replace('/','',$full_name);					
//echo '-----------'.$page_name.'++++++++';
?>
        <div class="navbar-collapse collapse">
          <div class="menu">
            <ul class="nav nav-tabs" role="tablist">
              <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
              <li role="presentation"> <a href="/" class="<?php echo ($page_name=='')?'active':'';?>">Home</a> </li>
              <li role="presentation"> <a href="<?php echo base_url(); ?>about" class="<?php echo ($page_name=='about')?'active':'';?>">About</a> </li>
              <li role="presentation"> <a href="<?php echo base_url(); ?>services" class="<?php echo ($page_name=='services')?'active':'';?>">Services</a> </li>
              <li role="presentation"> <a href="<?php echo base_url(); ?>panel-of-experts" class="<?php echo ($page_name=='panel-of-experts')?'active':'';?>">Experts</a> </li>
              <li role="presentation"> <a href="<?php echo base_url(); ?>contact" class="<?php echo ($page_name=='contact')?'active':'';?>">Contact</a> </li>
              <li role="login">
			<?php
            if($this->session->userdata('isUserLoggedIn'))
            {
            ?>
            <a href="<?php echo base_url(); ?>my_account" style="background-color:#FC0;
            "class="<?php echo ($page_name=='my_account')?'active':'';?>">MY ACCOUNT</a>
            <?php
            } 
            else
            {
            ?>
            <a href="<?php echo base_url(); ?>login" class="<?php echo ($page_name=='login')?'active':'';?>">Login</a>
            <?php 
			} 
			?>
              </li>
              <li role="presentation"> <a href="#" id="demo">Demo</a> </li>
             <?php /*?> <li role="presentation">
<a target="_blank" href="https://play.google.com/store/apps/details?id=com.wcareerprism_3740248&hl=en">
<img src="<?php echo base_url(); ?>assets/template/images/android.png"  height="30px;"/>
</a>
</li><?php */?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>
