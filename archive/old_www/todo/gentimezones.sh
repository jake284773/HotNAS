#!/bin/sh
basedir="/usr/share/timezones"

if [ ! -e "$basedir" ]
then
	mkdir -p "$basedir"
fi

while read line
do
	regiondir="$(echo $line | awk '{print $1}' | cut -d '/' -f1)"
	locdir="$(echo $line | awk '{print $1}' | cut -d '/' -f2)"
	
	if [ ! -e "$basedir/$regiondir" ]
	then
		mkdir -p "$basedir/$regiondir"
	fi
	
	echo $line | awk '{print $2}' > $basedir/$regiondir/$locdir
done < timezones
