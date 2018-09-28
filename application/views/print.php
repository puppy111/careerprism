<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script>
function print1()
{
$('.tabs').hide();
$('.hide').hide();
window.print();
$('.hide').show();
$('.tabs').show();
}
</script>

<style type="text/css" media="print">
@page 
{
  size: auto;   /* auto is the current printer page size */
  margin: 0mm;  /* this affects the margin in the printer settings */
}
.dontprint
{ 
	display: none; 
}
</style>


<ul class="tabs">
	<li><a href="javascript:;" onclick="print1();" catg_title="Add"><span>Print</span></a></li>
</ul>

<div>
<h1>PLEASE PRINT ONLY THIS SECTION<h1>
</div>

<div class="dontprint">
<h3>THIS SECTION WILL NOT GET PRINTED<h3>
</div>



</body>
</html>