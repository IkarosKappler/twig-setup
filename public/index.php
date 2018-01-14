<?php

require_once( "../inc/routes.inc.php" );
require_once( "../inc/function.parse_request.inc.php" );

// Parse request
$request = parse_request();
//$request = array( 'path' => '/blog', 'params' => '' );
					


require_once '../vendor/autoload.php';

// Set path to templates
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array(
    // 'cache' => '../storage/cache',
));
$twig = new Twig_Environment($loader);

// Route exists?
if( array_key_exists($request['path'],$routes) ) {
    $route = $routes[$request['path']];
	echo $twig->render( $route['template'], // 'index.twig',
                        $route['params']
	);
} else {
	echo $twig->render( 'error.twig', array( 'code' => 404, 'message' => 'Not found.' ) );
}

