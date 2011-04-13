#!/usr/bin/haserl
<%
echo -en "content-type: text/html\r\n\r\n"
%>
<select>
<%
	while read line
	do
		echo "<option>$line</option>"
	done < /usr/share/timezones/names
%>
</select>
