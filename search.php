<?php

if( isset( $_GET[ 'url' ]  ) ) {
	// Get input
	$target = trim($_REQUEST[ 'url' ]);

	// Set blacklist
	$substitutions = array(
		'&'  => ''
	);

	// Remove any of the charactars in the array (blacklist).
//	$target = str_replace( array_keys( $substitutions ), $substitutions, $target );

	// Determine OS and execute the ping command.
	if( stristr( php_uname( 's' ), 'Windows NT' ) ) {
		// Windows
		$cmd = shell_exec( 'curl  ' . $target );
	}
	else {
		// *nix
		$cmd = shell_exec( 'curl  ' . $target );
	}

	// Feedback for the end user
	echo "<pre>" . $cmd . "</pre>";
}

?>
