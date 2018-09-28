<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml" itemscope itemtype="http://schema.org/Organization">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />    
<meta itemprop="name" content="Careers in India - Careerprism"/>
<meta itemprop="description" content="Learn more about careers and job opportunities in Careerprism in India."/>
<meta itemprop="image" content=""/>

<title>Careers in India - Careerprism</title>

<meta name="title" content="Careers in India - Careerprism" />
<meta name="description" content="Learn more about careers and job opportunities in Careerprism in India." />
<meta name="keywords" content="careers in india, job opportunities in india, jobs, careers, innovation jockeys" />
<meta name="ROBOTS" content="FOLLOW,INDEX" />
<!--<meta name="canonical" content=https://www.careerprism.com" />-->
<link rel="canonical" href="https://www.careerprism.com" />


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />


<meta name="og:title" property="og:title" content="Careers in India - Careerprism" />
<meta name="og:description" property="og:description" content="Learn more about careers and job opportunities in Careerprism in India." />
<meta property="og:image" name="og:image" content="" />

<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="Careers in India - Careerprism" />
<meta name="twitter:description" content="Learn more about careers and job opportunities in Careerprism in India." />
<meta name="twitter:image" content="" />


<!-- Bootstrap -->
<link href="<?php echo base_url(); ?>assets/template/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/animate.css">
<link href="<?php echo base_url(); ?>assets/template/css/prettyPhoto.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/template/css/style.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/bootstrap/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
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
<?php $text = ' Ask any questions related to career,Take Aptitude and personality tests with career counselling , sure you will find your right career '; ?>
<div class="section-warp ask-me">
  <div class="container clearfix">
    <div class="box_icon box_warp box_no_border box_no_background" box_border="transparent" box_background="transparent" box_color="#FFF">
      <div class="row">
        <div class="col-md-3"> <img src="<?php echo base_url(); ?>assets/template/images/students.gif" /> </div>
        <div class="col-md-8">
          <form class="form-style form-style-2">
            <p>
              <textarea rows="4" id="question_title" class="typewriter"><?=$text;?></textarea>
              <i class="icon-pencil"></i> <span class="color button small publish-question" id="create-user">Ask Now</span> </p>
            Remaining Char:<span id="sms_char"></span>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="dialog-form" title="ASK ME">
  <p class="validateTips">Sms will be sent to your nearest career counselor , you will recieve a reply soon.</p>
  <h1 id="sms_sent"></h1>
  <form class="form-inline" action="destination.html" id="askme">
    <fieldset>
      <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" value="" class="text ui-widget-content ui-corner-all">
      </div>
      <div class="form-group">
      <label for="email">Email</label>
      <input type="text" name="email" id="email" value="" class="text ui-widget-content ui-corner-all">
      </div>
      <div class="form-group">
      <label for="phone">Phone</label>
      <input type="text" name="phone" id="phone" value="" class="text ui-widget-content ui-corner-all">
      </div>
      <div class="form-group">
      <label for="Pincode">Pincode</label>
      <input type="text" name="pincode" id="pincode" value="" class="text ui-widget-content ui-corner-all">
      </div>
	  
	  <div class="form-group">
      <label for="Message">Message</label>
      <textarea rows="4" col="5" id="message" class="text ui-widget-content ui-corner-all"> </textarea>
      </div>
      
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>
<div class="feature">
  <div class="container">
    <div class="text-center">
      <div class="row clearfix">
        <div class="col-md-4">
          <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" > 
           <a href="<?php echo base_url();?>aptitude/instructions"><i class="fa fa-book"></i></a>
            <h2><a href="<?php echo base_url();?>aptitude/instructions">Aptitude Test</a></h2>
            <p>Know your aptitude to get a right career</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" > 
          <a href="<?php echo base_url();?>personality/instructions"><i class="fa fa-laptop"></i></a>
            <h2><a href="<?php echo base_url();?>personality/instructions">Personality Test</a></h2>
            <p>Your Career path depends on your personality</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" > 
            <a href="<?php echo base_url();?>personality/instructions"><i class="fa fa-archive"></i></a>
            <h2><a href="<?php echo base_url();?>counseling-session">Counseling SESSION</a></h2>
            <p>Meet career counselors online for tips and guidance.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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
<script>
$("#question_title").focusin(function()
{  
   		//console.log('yyy')
		if($(this).val()='<?=$text;?>')
		{
			$(this).val(' ');  
		}
   		
});  
$('#question_title').focusout(function()
{  
    	//console.log('ee')
		if($(this).val()!=NULL)
		{
			$(this).val('<?=$text;?>'); 
		}
});
$('#question_title').keypress(function(e) 
{
	var tval = $('#question_title').val(),
	tlength = tval.length,
	set = 100,
	remain = parseInt(set - tlength);
	$('#sms_char').text(remain);
	
    if (remain <= 0 && e.which !== 0 && e.charCode !== 0) 
	{
        $('#question_title').val((tval).substring(0, tlength - 1))
    }
});
$('#create-user').click( function()
{
    var str = $('#question_title').val();
    $("#message").text(str);
});
</script> 
<!---------------------DIALOGUE BOX-----------------------------------> 
<script src="//code.jquery.com/jquery-1.10.2.js"></script> 
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
<script>
  $(function() {
    var dialog, form,
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
      name = $( "#name" ),
      email = $( "#email" ),
      phone = $( "#phone" ),
	  pincode = $( "#pincode" ),
      allFields = $( [] ).add( name ).add( email ).add( phone ).add( pincode ),
      tips = $( ".validateTips" );
	  
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o, n, min, max ) 
	{
      if ( o.val().length > max || o.val().length < min ) 
	  {
        o.addClass( "ui-state-error" );
		if(max == 0)
		{
        	updateTips( "Length of " + n + " must be  " + min + "char." );
		}
		//alert(max);
		if(max>0)
		{
        	updateTips( "Length of " + n + " must be between " + min + " and " + max + "." );
		}
        return false;
      }
	  else 
	  {
        return true;
      }
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
 
    function addUser() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
 
      valid = valid && checkLength( name, "name", 3, 16 );
      valid = valid && checkLength( email, "email", 6, 80 );
      valid = valid && checkLength( phone, "phone", 10, 16 );
	  valid = valid && checkLength( pincode, "pincode",6,6 );
 
      valid = valid && checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i, "Name may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
      valid = valid && checkRegexp( email, emailRegex, "eg. query@gmail.com" );
      valid = valid && checkRegexp( phone, /^([0-9])+$/, "Phone field only allow :0-9" );
	  valid = valid && checkRegexp( pincode, /^([0-9])+$/, "pincode field only allow :0-9" );
 
      if(valid) 
	  {
		
		var datastring = $("#askme").serialize();
		console.log(datastring);
		
		  $.ajax({
           type: "POST",
           url: "<?php echo base_url(); ?>askme",
           data: $("#askme").serialize(), 
           success: function(data)
           {
               //alert(data); 
			   $("#askme").text('Sms Sent Successfully');
           }
         });
		//$( "#askme" ).submit();	
		//setTimeout($('#dialog-form').dialog('close'), 5000);
      }
      return valid;
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 420,
      width:  500,
      modal: true,
      buttons: {
        "Send": addUser,
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass("ui-state-error" );
      }
	
	//$('#message').val($('#question_title').val()); 
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addUser();
    });
 
    $( "#create-user" ).button().on( "click", function() {
      dialog.dialog( "open" );
    });
  });
  </script> 
<!---------------------DIALOGUE BOX----------//------> 
<script src="<?php echo base_url(); ?>assets/template/js/jquery.typetype.min.js"></script> 
<script>
$(function() {
$(".typewriter").typewriter({
'speed':100 // default: 300
});
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
<!-- Modal HTML -->

</body>
</html>