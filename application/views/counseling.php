<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Careerism Conselling</title>
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

</head>
<body>
<?php include('menu.php'); ?>
<div id="breadcrumb">
  <div class="container">
    <div class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li>Counseling SESSION</li>
    </div>
  </div>
</div>

<div class="container" style="color:#000; font-weight:bold;">
<?php /*?>  
<section id="contact-page">
    <div class="container">       
        <div class="row contact-wrap"> 
        <form  method="post" action="https://quickpay.alliedwallet.com/">
        <input name="QuickPayToken" type="hidden" value="AAEAAELX4rkKi05vPjqvqoOCYkdFnDyjeu327sSDwyyx-TKC5scy39Cgc9bAaWd5WOJhOcXmJa5ccSCSSMijylpH-_yvf-8Shdv3MakUXFAOl-srBSDm2Ifhn2PGX8ZMZT0v8SWQwbvXWrig-2O_i3uT9v7Kst_d14Wt_6mgn_-aW5bY8cwlaxVhW6nuuuC4ZrzcxlF6b3Gh5VjEUdzExSOUJTdWkMJtdEc8PpsvvsF3A8O514tupiqnYcio1aVGm8I0QpEVbFEX_a-381XZx8LVXOZAVe2f2NacV9lbbwXhh6c3ru5KnbaZL3ahgZmWha-cNPvlEO6ziQ0AK0k8xod8fAqkAQAAAAEAAFpK-7EP2ifgPTL_0Gvrg1QoLbcd7WCQqCz_n-n18jwlQL3IeVVHcFZBqXdWlGd6_3hw-mB0GAIfDMMKACy9lur0BjmG3K5dRiTIqJNwSbaque5LuMmT7S3GhutC496twW_5-m62g66rHSgbYUbOAnT6KlCLxj7bKTT87aAGKOgh3szWNne-0m0MmsNH4uuZc1pYRR_Lza9yYsJthITr5Tu84tk8WacbjhiJyzn_lH0m3oXdbnzWkp8TKqR27ZPyE-NVkBNM617DrZp7lREL-F62Ua06lvtjBdDeqnIL0Z8WXSdcswkNNvqpXrlz1Gv3m8kO8BMCftcdcQQx__o7zsJzrDWUq5QYQVOc3V_RclPzVKKf5c1NjDqpLWaXHYgRDqEoQkZTettnXxfR6STTh9jsEhYXMZGgJB3FGIHCdn_mKRKRF_7LSsMHzNe5n5VepBicJqlBNKWE8fEhGn_3A5ZJw1xvcRxeTsHuUh78qwfe4L_qZ9z8OKHtHaV6xntiERzHwckavdW65Y1Htewn50SOcOi3e50_Tkn0otvs9mHE">
        <input name="SiteID" type="hidden" value="31342">
        <input name="AmountTotal" type="hidden" value="10.00">
        <input name="CurrencyID" type="hidden" value="USD">
        <input name="AmountShipping" type="hidden" value="0.00">
        <input name="ShippingRequired" type="hidden" value="false">
        <input name="MembershipRequired" type="hidden" value="true">
        <input name="ItemName[0]" type="hidden" value="Iteams Name">
        <input name="ItemQuantity[0]" type="hidden" value="1">
        <input name="ItemAmount[0]" type="hidden" value="10.00">
        <input name="ItemDesc[0]" type="hidden" value="some product desc">
        <input name="ApprovedURL" type="hidden" value="http://www.tetra-tours.com/thankyou">
        <input name="ConfirmURL" type="hidden" value="http://www.tetra-tours.com/confirmorder">
        <input name="DeclinedURL" type="hidden" value="http://www.tetra-tours.com/decline">
        <input name="MerchantReference" type="hidden" value="110">
        <input name="MembershipUsername" type="hidden" value="testusername">
        <input type="submit" value="Paynow" class="btn btn-primary btn-lg">
        </form>
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#contact-page-->	<?php */?>



  
<section id="contact-page">
    <div class="container">       
        <div class="row contact-wrap"> 
          
          <?php
// Merchant key here as provided by Payu
$MERCHANT_KEY = "hDkYGPQe";

// Merchant Salt as provided by Payu
$SALT = "yIEkykqEH3";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()">
    <h2>PayU Form</h2>
    <br/>
    <?php if($formError) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <table>
        <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td>Amount: </td>
          <td><input name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" /></td>
          <td>First Name: </td>
          <td><input name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" /></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
          <td>Phone: </td>
          <td><input name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
        </tr>
        <tr>
          <td>Product Info: </td>
          <td colspan="3"><textarea name="productinfo"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea></td>
        </tr>
        <tr>
          <td>Success URI: </td>
          <td colspan="3"><input name="surl" value="<?php echo (empty($posted['surl'])) ? '' : $posted['surl'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td>Failure URI: </td>
          <td colspan="3"><input name="furl" value="<?php echo (empty($posted['furl'])) ? '' : $posted['furl'] ?>" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>

        <tr>
          <td><b>Optional Parameters</b></td>
        </tr>
        <tr>
          <td>Last Name: </td>
          <td><input name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" /></td>
          <td>Cancel URI: </td>
          <td><input name="curl" value="" /></td>
        </tr>
        <tr>
          <td>Address1: </td>
          <td><input name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" /></td>
          <td>Address2: </td>
          <td><input name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" /></td>
        </tr>
        <tr>
          <td>City: </td>
          <td><input name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" /></td>
          <td>State: </td>
          <td><input name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" /></td>
        </tr>
        <tr>
          <td>Country: </td>
          <td><input name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" /></td>
          <td>Zipcode: </td>
          <td><input name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF1: </td>
          <td><input name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /></td>
          <td>UDF2: </td>
          <td><input name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF3: </td>
          <td><input name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /></td>
          <td>UDF4: </td>
          <td><input name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF5: </td>
          <td><input name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" /></td>
          <td>PG: </td>
          <td><input name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" /></td>
        </tr>
        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Submit" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
         <!-- https://trinitytuts.com/payumoney-payment-gateway-integration-in-php/   -->        
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#contact-page-->	
</div>
<?php
include('footer.php');
?>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</body>
</html>