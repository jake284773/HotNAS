<?php

/*
	libraries/Status.php

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

class Status
{
	function getuptime()
	{
		$file = explode(' ', file_get_contents('/proc/uptime'));
		$uptime = $file[0];
		
		$days = floor($uptime / (60 * 60 * 24));
		$remainder = $uptime % (60 * 60 * 24);
		$hours = floor($remainder / (60 * 60));
		$remainder = $remainder % (60 * 60);
		$minutes = floor($remainder / 60);
		$seconds = $remainder % 60; 
		
		return $days . ' days ' . $hours . ' hours ' . $minutes . ' minutes ' . $seconds . ' seconds ';
	}
	
	function getpercentage($value, $total)
	{
		$value = $value * 100;
		return floor($value / $total);
	}
	
	function convertdata($data, $returnmode = 1)
	{
		if(isset($data) && isset($returnmode))
		{
			if($data > 1048576)
			{
				$range = 'GB';
				$data = $data / 1048576;
			}
			else if($data > 1024)
			{
				$range = 'MB';
				$data = $data / 1024;
			}
			else
			{
				$range = 'KB';
			}
			
			switch($returnmode)
			{
				case 1:
					return floor($data);
					break;
				case 2:
					return $range;
					break;
				case 3:
					return floor($data) . ' ' . $range;
					break;
				default:
					return FALSE;
			}
		}
		else
			return FALSE;
	}
	
	function getmeminfo($mode = 'used', $showkey = FALSE)
	{
		switch($mode)
		{
			case 'used':
				if($showkey)
					return $this->convertdata(shell_exec("/frontend/cli/www_helpers/meminfo used"), 3);
				else
					return $this->convertdata(shell_exec("/frontend/cli/www_helpers/meminfo used"), 1);
				break;
			case 'free':
				if($showkey)
					return $this->convertdata(shell_exec("/frontend/cli/www_helpers/meminfo free"), 3);
				else
					return $this->convertdata(shell_exec("/frontend/cli/www_helpers/meminfo free"), 1);
				break;
			case 'total':
				if($showkey)
					return $this->convertdata(shell_exec("/frontend/cli/www_helpers/meminfo total"), 3);
				else
					return $this->convertdata(shell_exec("/frontend/cli/www_helpers/meminfo total"), 1);
				break;
			default:
				return FALSE;
		}
	}
}

?>
