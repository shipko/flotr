<?php
	$formula = stripslashes(base64_decode(str_replace(' ','+',$_GET['string'])));
	
	if(!empty($formula)) {
		header('Content-type: image/png');
		require('mathpublisher.php');
		mathfilter($formula,18);
	} else {
		exit('empty get');
	}
?>