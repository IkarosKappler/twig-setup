<?php

/**
 * @author  Ikaros Kappler
 * @date    2018-01-13
 * @version 1.0.0
 **/

/**
 * Parses the REQUEST_URI and returns an array:
 *  array( 'path' => :string, 'params' => :string )
 **/
function parse_request() {
    $request_uri    = trim($_SERVER['REQUEST_URI']);
    $request_path   = $request_uri; 
    $request_params = null;
    if (($position = strpos($request_uri, '?')) !== FALSE) {
        $request_path   = substr($request_uri, 0, $position);
        $request_params = substr($request_uri, $position+1);
    }
    // Trim trailing slash?
    if( $request_path != '/' && substr($request_path,-1) == '/' )
    	$request_path = substr($request_path, 0, strlen($request_path)-1 );
    return array( 'path' => $request_path, 'params' => $request_params );
}