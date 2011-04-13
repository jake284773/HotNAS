#!/usr/bin/haserl
<%in libs/mainvars.cgi %>
<%in libs/functions.cgi %>
<%
	ptitle="Status"
	filename="index.cgi"
	outputlicense
%>
<%in sections/header.cgi %>
<in libs/statusfunc.cgi %>
				<h3>Welcome to HotNAS!</h3>
				<div class="grid_3 box">
					<h4>System Information</h4>
					<table>
						<tr>
							<td>Hostname</td>
							<td>CPU</td>
						</tr>
						<tr>
							<td><% gethostname %></td>
							<td><% getcpuname %></td>
						</tr>
					</table> 
				</div>
<%in sections/footer.cgi%>
