<?php

// Define the routes.
$routes  = array(
    '/'     => array( 'template' => 'index.twig',
                      'params' => array() ), 
    '/blog' => array( 'template' => 'blog.twig',
                      'params' => array() ), 
    '/blog/blog.20150422_my_basic_html_template' => array( 'template' => 'blog.20150422_my_basic_html_template.twig',
                                                             'params' => array( 'bannertext' => '<img src="/img/good_new_everyone_0_1.png" alt="Good news, everyone" />',
                                                                                'headline' => 'My very basic HTML template' )
    )
);	