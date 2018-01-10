<?php

// Parse request
function get_request() {
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

$request = get_request();
//$request = array( 'path' => '/blog', 'params' => '' );
$routes  = array( '/' => 'index.twig',
				  '/blog' => 'blog.twig' 
				);				
			


require_once '../vendor/autoload.php';

// Set path to templates
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array(
    // 'cache' => '../storage/cache',
));
$twig = new Twig_Environment($loader);

// Route exists?
if( array_key_exists($request['path'],$routes) ) {
	echo $twig->render( $routes[$request['path']], // 'index.twig',
		                array('title' => null, 'headline' => 'Welcome')
	);
} else {
	echo $twig->render( 'error.twig', array( 'code' => 404, 'message' => 'Not found.' ) );
}



// Debug?
//print_r( $request );


