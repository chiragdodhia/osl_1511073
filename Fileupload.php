<?php
	function UploadFile($tmpname,$size,$ext)
	{
		$valid = true;
        //validate file extensions
        if ( !in_array($ext, array('jpg','jpeg','png','gif','pdf','txt','doc','docx')) ) {
            $valid = false;
            $response = 'Invalid file extension.';
        }
        //validate file size
        if ( $size/1024/1024 > 2 ) {
            $valid = false;
            $response = 'File size is exceeding maximum allowed size.';
        }
        //upload file
        if ($valid) {
            $targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. 'uploads' . DIRECTORY_SEPARATOR. $name;
            move_uploaded_file($tmpName,$targetPath);
            header( 'Location: Retrieve.php' ) ;
            $response = "Success";
            return $response;
        }
        else
			return response;
	}
?>