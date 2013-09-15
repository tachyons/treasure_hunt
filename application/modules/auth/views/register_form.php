<style type="text/css">
      body {
        /*padding-top: 40px;*/
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signup {
        max-width: 430px;
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
      .form-signup .form-signin-heading,
      .form-signup .checkbox {
        margin-bottom: 10px;
      }
      .form-signup input[type="text"],
      .form-signup input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

</style>
<?php
if ($use_username) {
$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
$address = array(
	'name'	=> 'address',
	'id'	=> 'address',
	'value' => set_value('address'),
	'maxlength'	=> 200
);
$phone = array(
	'name'	=> 'phone',
	'id'	=> 'phone',
	'value' => set_value('phone'),
	'maxlength'	=> 20
);
$regform= array(
	'class' => 'form-horizontal form-signup', 
	'id' => 'regform');

?>
<?php $this->form_validation->set_error_delimiters('<div class="alert alert-error"> <button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>'); ?>
<?php echo form_open($this->uri->uri_string(),$regform); ?>
	<!-- username -->
	<?php if ($use_username) { ?>
		<?php $this->form_builder->text($username['id'], 'User name',$username['value']); ?>
		<?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>
	<?php } ?>
	<!-- email -->
	<?php $this->form_builder->text($email['id'], 'Email',$email['value']); ?>
	<?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
	<!-- phone -->
	<?php $this->form_builder->text($phone['id'], 'Phone',$phone['value']); ?>
	<?php echo form_error($phone['name']); ?><?php echo isset($errors[$phone['name']])?$errors[$phone['name']]:''; ?>
	<!-- password-->
	<?php $this->form_builder->password($password['id'], $password['name'], $password['value']); ?>
	<?php echo form_error($password['name']); ?>
	<!-- confirm password-->
	<?php $this->form_builder->password($confirm_password['id'], $confirm_password['name'], $confirm_password['value']); ?>
	<!--address -->
	<?php $this->form_builder->textarea($address['id'], $address['name'],'','input-xlarge',5); ?>
	<?php echo form_error($address['name']); ?><?php echo isset($errors[$address['name']])?$errors[$address['name']]:''; ?>
	<?php if ($captcha_registration) {
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
		 <div class="control-group">
		 	<label class="control-label" >Enter the code exactly as it appears:</label>
		 	<div class="controls">
		 		<?php echo $captcha_html; ?>
		 	</div>
		</div>
		<?php //echo $captcha_html; ?>
		<?php $this->form_builder->text($captcha['id'],$captcha['name'],''); ?>
		<?php echo form_error($captcha['name']); ?>
	<?php }
	} ?>
</table>
<?php $this->form_builder->single_button('Register', 'register', 'btn-primary'); ?>
<?php echo form_close(); ?>
