<style type="text/css">
      body {
        /*padding-top: 40px;*/
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

</style>
<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'input-block-level'
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
	'class' => 'input-block-level'
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>

<div class="container"> 
<?php 
$attributes = array('class' => 'form-signin', 'id' => 'myform');
echo form_open($this->uri->uri_string(),$attributes);?>
<h2 class="form-signin-heading">Please sign in</h2>
	<?php echo form_label($login_label, $login['id']); ?>
	<?php echo form_input($login); ?>
	<?php echo form_error($login['name'],'<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'); ?>
			
	<?php echo isset($errors[$login['name']])?'<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$errors[$login['name']].'</div>':''; ?>	
	<?php echo form_label('Password', $password['id']); ?>
	<?php echo form_password($password); ?>
	<?php echo form_error($password['name'],'<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'); ?><?php echo isset($errors[$password['name']])? '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$errors[$password['name']].'</div>':''; ?>
	

	<?php if ($show_captcha) {
		if ($use_recaptcha) { ?>
	<tr>
		<td colspan="2">
			<div id="recaptcha_image"></div>
		</td>
		<td>
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		</td>
		<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
		<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
		<?php echo $recaptcha_html; ?>
	</tr>
	<?php } else { ?>
	
		<p>Enter the code exactly as it appears:</p>
		<?php echo $captcha_html; ?>
		<?php echo form_label('Confirmation Code', $captcha['id']); ?>
		<?php echo form_input($captcha); ?>
		<?php echo form_error($captcha['name'],'<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'); ?>
	<?php }
	} ?>

	<br/>
	<?php echo form_checkbox($remember); ?>
	<?php echo form_label('Remember me', $remember['id']); ?>
	<?php $attributes = array('class' => 'btn btn-large btn-primary', 'id' => 'submit'); ?>
	<?php echo form_submit('submit','submit',$attributes); ?>
	<br/>
	<?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?>
	<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>
</div>
<?php echo form_close(); ?>
