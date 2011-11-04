<?php

ini_set('display_errors',1); 
error_reporting( -1 );


/**
 * Function which shows time diff in human-friendly form
 */

function time_since( $time )
{
	$periods = array( "second", "minute", "hour", "day", "week", "month", "year", "decade" );
	$lengths = array( "60","60","24","7","4.35","12","10" );

	$now = time();

	$difference = $now - $time;
	$tense = "ago";

	for ( $j = 0; $difference >= $lengths[$j] && $j < count( $lengths ) - 1; $j++ ) {
		$difference /= $lengths[$j];
	}

	$difference = round( $difference );

	if ( $difference != 1 )
		$periods[$j].= "s";
	
	return "$difference $periods[$j] 'ago' ";
}


function dlmt( $path = '' ) {
	
	$files = scandir( $path );
		
	$timestamp = array();
	
	// read last modified time of all files
	foreach ( $files as $file ) {
		if ( $file != '.' && $file != '..' )
			$timestamp[$file] = filemtime( $path . $file );
	}
	
	$most_fresh_file_time = max( $timestamp );
	
	echo time_since( $most_fresh_file_time );
}

dlmt( '/home/ashfame/www/git/' );



