<?php
$this->load->helper('form');

if(empty($auth_failed))
	$auth_failed = FALSE;

if($auth_failed)
	echo('Authentication Failed!');
?>

<?=form_open('user/login')?>

<div>
	<label for="username">Username</label>
	<input type="text" name="username" />
</div>

<div class="clear"></div>

<div>
	<label for="password">Password</label>
	<input type="password" name="password" />
</div>

<div class="clear"></div>

<div class="right">
	<input class="button" type="submit" value="Submit" />
</div>

<?=form_close()?>
