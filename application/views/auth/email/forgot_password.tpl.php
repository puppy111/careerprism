<html>
<body>
	<h5><?php echo sprintf(lang('email_forgot_password_heading'), $identity);?></h5>
	<p><?php echo sprintf(lang('email_forgot_password_subheading'), anchor('admin/auth/reset_password/'. $forgotten_password_code, lang('email_forgot_password_link')));?></p>
</body>
</html>