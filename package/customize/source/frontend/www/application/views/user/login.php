<?php

/*
	views/user/login.php

	Copyright 2011 Jake Moreman <me@jakemoreman.co.uk>

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
	MA 02110-1301, USA.
*/

$this->load->helper('form');
?>

<?php if(!empty($msgcode)): ?>
	<div class="<?php echo $msgcode; ?>"><?php echo $msgtext; ?></div>
<?php endif; ?>

<h3>Login</h3>

<?=form_open('user/login')?>

<div>
	<label for="username">Username</label>
	<input type="text" name="username" />
</div>

<div class="fclear"></div>

<div>
	<label for="password">Password</label>
	<input type="password" name="password" />
</div>

<div class="fclear"></div>

<div class="right">
	<input class="button" type="submit" value="Submit" />
</div>

<?=form_close()?>
