<?php
	function download_remote_file_with_curl($file_url, $save_to)
	{
		$cmd='wget "http://www.rockybytes.com/bytes-that-rock/uploads/programas/winrar-9623.jpg" -p  "D:\test\" 2>&1';
		exec($cmd );
		echo "Executer";
 
	}
		download_remote_file_with_curl('http://www.rockybytes.com/bytes-that-rock/uploads/programas/winrar-9623.jpg', realpath("./downloads") . '/file.exe');




?>

