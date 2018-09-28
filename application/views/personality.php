<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Personality Test</title>
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
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery-steps/css/normalize.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery-steps/css/main.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery-steps/css/jquery.steps.css">
</head>
<style>
.container .text-center {
	margin-top: 2%;
}
.container .text-center {
	margin-top: 2%;
}
ul[role="tablist"] .disabled {
	display: none;
}
ul[role="tablist"] .done {
	display: none;
}
.wizard > .content {
	width: 100%;
}
.wizard > .content > .body{
	height:0px;
}
</style>
<body>
<?php include('menu.php'); ?>
<div id="breadcrumb">
  <div class="container">
    <div class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li>Personality Test</li>
    </div>
  </div>
</div>
<div class="container" style="color:#000; font-weight:bold;">
  <div class="form-group test_link">
    <div class="bits_col">
      <form id="wizard" action="<?php echo base_url(); ?>personality/res" method="post">
        <?php 
    //echo form_open('aptitude/res');
    $sno = 1;
	
	//echo '<pre>';print_r($ptest);echo '</pre>'; exit;
    foreach($ptest as $key=>$val)
    {
	    echo "<h3></h3>";
        echo "<fieldset class='bits_block'><div class='label_txt'>";
        echo '(Q'.$sno.') '.$val['question'].'?<br/>';
    ?>
        <label class="block_bit1"> <span>1</span> DISAGREE
          <input type="radio" name="anw_<?=$key;?>"  value="1"  required />
        </label>
        <label class="block_bit2"><span>2</span> SLIGHLY DISAGREE
          <input type="radio" name="anw_<?=$key;?>"  value="2"  required />
        </label>
        <label class="block_bit3"><span>3</span> NEUTRAL
          <input type="radio" name="anw_<?=$key;?>"  value="3"  required />
        </label>
        <label class="block_bit4"><span>4</span> SLIGHTLY AGREE
          <input type="radio" name="anw_<?=$key;?>"  value="4"  required />
        </label>
        <label class="block_bit5"> <span>5</span> AGREE
          <input type="radio" name="anw_<?=$key;?>"  value="5"  required />
        </label>
		<?php
        echo "<h3 style=color:orange;>Question: (".$sno.'/'.sizeof($ptest).")</h3>";	
        echo "</div> <div class='cartoon_img'><img src='assets/template/cartroon2/$sno.jpg' class='img-thumbnail'></div> </fieldset>";
        $qids[] = 'anw_'.$key;
        $sno++;
     }
     ?>
        <h3></h3>
        <fieldset>
          <legend>
           <br/>
           <h3 style="color:brown;">
            <b>
            You have successfully answered all the Questionnaire's.<br/> 
            Click Finish to Get Personality Aptitude Test Result.<br/>
            </b>  
           </h3>
          </legend>
        </fieldset>
      </form>
      <div class='qids' style="visibility:hidden;">
        <?php
	$comma_seprated = implode(',', $qids);
	//$comma_seprated = $qids;
	print_r($comma_seprated);
	?>
      </div>
      <?php //echo '<pre>';print_r($comma_seprated).'</pre>'; ?>
    </div>
  </div>
</div>
</body>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/jquery-steps/js/jquery.steps.js"></script>
<!------------------------------------PUPPY TRYING IN BELOW CODE------------------------------------------>
<script>
var form = $("#wizard").show();
form.steps
({
	headerTag: "h3",
	bodyTag: "fieldset",
	transitionEffect: "slideLeft",
	stepsOrientation: "vertical",	 
	onStepChanging: function (event, currentIndex, newIndex)
	{
		
		var arr1 = $('.qids').text().split(",");
		var nxt  = arr1[currentIndex];
		var answ = $("form#wizard  input[name=" + nxt + "]:checked").val();
		//alert("step"+currentIndex);
		//alert(answ);
		
		if(answ == undefined)
		{
			var answ = 0;
		}
		// Allways allow previous action even if the current form is not valid!
		if (currentIndex > newIndex)
        {
            return true;
        }
		 // Forbid next action on "Warning" step if the user is to yo
		if(currentIndex >=0 && answ == '0')
		{
			console.log('dontslide');
			return false;
		}
		else
		{
			console.log('slide');
			return true;
		}
		// Needed in some cases if the user went back (clean up)
        if (currentIndex < newIndex)
        {
            // To remove error styles
            form.find(".body:eq(" + newIndex + ") label.error").remove();
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    onStepChanged: function (event, currentIndex, priorIndex)
    {
        // Used to skip the "Warning" step if the user is old enough.
        if(currentIndex >=0 && answ == '0')
        {
            form.steps("next");
        }
       
    },
	onFinishing: function (event, currentIndex)
    {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function (event, currentIndex)
    {
        $( "#wizard" ).submit();
		//alert("Submitted!");
    }
}).validate
({
    errorPlacement: function errorPlacement(error, element) { element.before(error); },
	/*rules: 
	{
        anw_132: 
		{
            required: ":checked"
        },
		anw_133: 
		{
            required: ":checked"
        }
    }*/
});	
</script>
<!------------------------------------PUPPY TRYING IN BELOW CODE------------------------------------------!-->
</html>
<!--var answ = $("form#wizard  input[name=anw_129]:checked").val();-->