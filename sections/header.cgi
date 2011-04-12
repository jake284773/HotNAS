#!/usr/bin/haserl
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title><%= $ptitle %> | <%= $sitename %></title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" href="css/framework.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>

	<body class="main">
		<div id="container" class="grid_12">
			<div id="header" class="grid_12">
				<h1><%= $sitename %></h1>
				<h2><%= $sitedescription %></h2>
			</div>
			
			<div id="menu" class="grid_12">
				<ul>
					<li>Home/Status</li>
					<li>Storage
						<ul>
							<li>Drives</li>
							<li>Shares</li>
						</ul>
					</li>
					<li>Services
						<ul>
							<li>Samba</li>
							<li>NFS</li>
							<li>FTP</li>
							<li>HTTP</li>
							<li>DNS/DHCP</li>
						</ul>
					</li>
					<li>Extras
						<ul>
							<li>Downloads</li>
						</ul>
					</li>
					<li>Diagnostics
						<ul>
							<li>Logs</li>
							<li>Process list</li>
							<li>Hardware Information</li>
						</ul>
					</li>
				</ul>
			</div>
			
			<div id="content" class="grid_12">
