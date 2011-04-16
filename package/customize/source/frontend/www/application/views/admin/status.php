<?php

/*
	views/admin/status.php

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

?>

<h3>Status</h3>

<table>
	<tr>
		<th>Hostname</td>
		<td><?php echo $hostname; ?></td>
	</tr>
	
	<tr>
		<th>Version</td>
		<td>
			<span><?php echo $version; ?></span>
			<span><?php echo $build_date; ?></span>
		</td>
	</tr>
	
	<tr>
		<th>Linux Kernel version</td>
		<td><?php echo exec('uname -r'); ?></td>
	</tr>
	
	<tr>
		<th>CPU</td>
		<td><?php echo shell_exec('cat /proc/cpuinfo | awk \'NR==5\' | cut -d: -f2'); ?></td>
	</tr>
	
	<tr>
		<th>Uptime</td>
		<td><?php echo $this->status->getuptime(); ?></td>
	</tr>
	
	<tr>
		<th>Time/Date</td>
		<td><?php echo date('H:i D j F Y'); ?></td>
	</tr>
	
	<tr>
		<th>Memory Usage</td>
		<td><div class="progressbar">
				<div class="level" style="width: <?php echo $this->status->getpercentage($this->status->getmeminfo('used', FALSE), $this->status->getmeminfo('total', FALSE)) ?>%">
				</div>
			</div>
		</td>
	</tr>
	
	<tr>
		<th>Storage Usage</td>
		<td>
			<!-- TODO -->
		</td>
	</tr>
	
	<tr>
		<th>Load Average</td>
		<td><?php shell_exec('uptime | cut -d " " -f8-'); ?></td>
	</tr>
</table>
