<?php

/*
	views/admin/diagnostics/logs.php

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

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>

<h3>Diagnostics - Logs</h3>

<?=form_open('admin/diagnostics/logs') . "\n" ?>

<div>
	<?=form_label('Filename', 'filename', array('style' => 'inline')) . "\n" ?>
	<?php
	$file_list = array(
		'/var/log/messages' => 'messages',
		'/var/log/log.nmbd' => 'log.nmbd',
		'/var/log/log.smbd' => 'log.smbd'
	);
	echo form_dropdown('filename', $file_list, $filename, 'onChange="this.form.submit()"') . "\n";
	?>
</div>

<div class="fclear"></div>

<div>
	<?php
	echo form_label('File contents', 'filedata', array('class' => 'block')) . "\n";
	$file_textarea_options = array(
		'name'		=> 'file_textarea',
		'value'		=> $filecontents
	);
	echo form_textarea($file_textarea_options) . "\n";
	?>
</div>

<?=form_close()?>


