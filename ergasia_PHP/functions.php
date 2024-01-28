<?php

function upload($post_file, $path) {
		$userfile       = $_FILES[$post_file]['tmp_name']; // $userfile is where file went on webserver
  		$userfile_name  = $_FILES[$post_file]['name']; // $userfile_name is original file name
  		$userfile_size  = $_FILES[$post_file]['size']; // $userfile_size is size in bytes
  		$userfile_type  = $_FILES[$post_file]['type']; // $userfile_type is mime type e.g. image/gif
  		$userfile_error = $_FILES[$post_file]['error']; // $userfile_error is any error encountered
		// use this code with newer versions
  		if ($userfile_error){
    		echo 'Problem: ';
    		switch ($userfile_error){
      			case 1:  echo 'File exceeded upload_max_filesize';  break;
      			case 2:  echo 'File exceeded max_file_size';  break;
      			case 3:  echo 'File only partially uploaded';  break;
      			case 4:  echo 'No file was uploaded';  break;
				case 6:  echo 'Missing a temporary folder'; break;
				case 7:  echo 'Failed to write file to disk'; break;
				case 8:  echo 'A PHP extension stopped the file upload'; break;
    		}
    		return false;
  		}
		
		// one more check: does the file have the right MIME type?
		$user_filetype_error=1;
		switch($userfile_type){
			case 'image/jpeg': $user_filetype_error=0; break;
			case 'image/jpg' : $user_filetype_error=0; break;
			case 'image/png' : $user_filetype_error=0; break;
			case 'image/gif' : $user_filetype_error=0; break;
		}
 		 if ($user_filetype_error) {
   		 	echo 'Problem, file is not in appropriate format : ';
			echo $userfile_type;
  		  	return false;
 		 }
		 
		$ext = pathinfo($userfile_name, PATHINFO_EXTENSION);
		$ext = ".".$ext;
		
		//set unique filename to avoid conflicts with existing filenames
		$upfile = $path.uniqid().$ext;
		
		// is_uploaded_file and move_uploaded_file added at version 4.0.3
  		if (is_uploaded_file($userfile)) {
     			if (!move_uploaded_file($userfile, $upfile)){
        			echo 'Problem: Could not move file to destination directory';
        			return false;
				/******************** <UNIX>  ****************************/
	  			} else {
					if(!chmod($upfile, 0644)){
	 					echo "Problem: Unable to change file permissions";
	 					return false;
     					} /*************  </UNIX>  *************************/
	   			}
  		} else {
    			echo 'Problem: Unknown file upload error. Filename: '.$userfile_name;
    			return false;
  		}
		
		return $upfile;
	} //function upload
    
    
?>