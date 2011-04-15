<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Files
{
	function getDirectoryList($directory, $output_path = 0) 
	{
		$results = array();
		$handler = opendir($directory);

		while ($file = readdir($handler))
		{
			if ($file != "." && $file != "..")
			{
				if($output_path)
					$results[] = $directory . '/' . $file;
				else
					$results[] = $file;
			}
		}
		
		closedir($handler);
		return $results;
	}
}

?>
