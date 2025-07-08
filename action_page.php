<?php

header ("X-XSS-Protection: 0");
if( isset( $_GET[ 'firstname' ]  ) ) {
	// Get input
	$check = $_REQUEST[ 'firstname' ];
	// Feedback for the end user
$substitutions = array(
'onlolll' => 'nono',

	);

// Remove any of the charactars in the array (blacklist).
$target = str_replace( array_keys( $substitutions ), $substitutions, $check );	





	echo "<html><body>" . $target . "</body></html>";
}

?>
