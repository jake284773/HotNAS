<?php

/*
	views/footer_login.php

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

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="author" content="Jake Moreman" />
		<meta name="copyright" content="&copy; 2009 - <?=date('Y')?> Jake Moreman" />
		<title><?=$title?> | <?=$app?></title>
		<link rel="stylesheet" type="text/css" href="/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="/css/framework.css" />
		<link rel="stylesheet" type="text/css" href="/css/main.css" />
	</head>

	<body class="main admin">
		<div id="container" class="container_12">
			<div id="header" class="grid_12">
				<img id="logo" src="/img/logo.png" alt="Logo" />
				<h1><?=$app?></h1>
				<h2><?=$slogan?></h2>
			</div>
			<div id="menu" class="grid_2 left">
				<ul>
					<li><a href="admin/status">Status</a></li>
					<li><a href="#">Storage</a>
						<ul>
							<li><a href="#">Disks</a></li>
							<li><a href="#">LVM</a></li>
							<li><a href="#">Shares</a></li>
						</ul>
					</li>
					<li><a href="#">Services</a>
						<ul>
							<li><a href="#">FTP</a></li>
							<li><a href="#">HTTP</a></li>
							<li><a href="#">CIFS/SMB</a></li>
							<li><a href="#">NFS</a></li>
							<li><a href="#">DNS/DHCP</a></li>
						</ul>
					</li>
					<li><a href="#">Diagnostics</a>
						<ul>
							<li><a href="#">Logs</a></li>
						</ul>
					</li>
					<li><a href="/user/logout">Logout</a></li>
				</ul>
			</div>
			
			<div id="main" class="grid_7 right">
