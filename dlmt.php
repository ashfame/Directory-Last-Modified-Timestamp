<?php

function dlmt( $path = '' ) {
	// open the directory handler
	$dir_handler = opendir( $path );
	
	// collect filenames
	while( $file = readdir( $dir_handler ) )
		if ( $file != '.' && $file != '..' )
			$files[] = $file;
	
	// close handler
	closedir($handler);
	
	$timestamp = array();
	
	// read last modified time of all files
	foreach ( $files as $file ) {
		$timestamp[$file] = filemtime( $file );
	}
	
	$most_fresh_file_time = max( $timestamp );
	
	echo human_time_diff( $most_fresh_file_time );
}


/**
 * Function which shows time diff in human-friendly form
 *
 * Credit: WordPress
 */

function human_time_diff( $from, $to = '' ) {
	if ( empty($to) )
		$to = time();
	$diff = (int) abs($to - $from);
	if ($diff <= 3600) {
		$mins = round($diff / 60);
		if ($mins <= 1) {
			$mins = 1;
		}
		/* translators: min=minute */
		$since = sprintf(_n('%s min', '%s mins', $mins), $mins);
	} else if (($diff <= 86400) && ($diff > 3600)) {
		$hours = round($diff / 3600);
		if ($hours <= 1) {
			$hours = 1;
		}
		$since = sprintf(_n('%s hour', '%s hours', $hours), $hours);
	} elseif ($diff >= 86400) {
		$days = round($diff / 86400);
		if ($days <= 1) {
			$days = 1;
		}
		$since = sprintf(_n('%s day', '%s days', $days), $days);
	}
	return $since;
}
