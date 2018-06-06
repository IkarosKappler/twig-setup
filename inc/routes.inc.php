<?php

// Define the routes.
$routes  = array(
    //'/sitemap.txt' => array( 'template' => 'sitemap.twig',
    //                  'params' => array()
    //), 
    '/'     => array( 'template' => 'index.twig',
                      'params' => array()
    ), 
    /* '/blog' => array( 'template' => 'blog.twig',
                      'params' => array()
    ), */
    '/contact' => array( 'template' => 'contact.twig',
                         'params' => array()
    ),
    '/blog/blog.20161028_Create_Zip_files_omitting_DS_Store_files' => array( 'template' => 'blog.20161028_Create_Zip_files_omitting_DS_Store_files.twig',
                                                             'params' => array( 'bannertext' => 'Good news, everyone!',
                                                                                'headline' => 'Create ZIP files omitting DS_Store files' ),
                                                                             'date' => '2016-10-28',
                                                                             'priority' => 0.5
    ),
    '/blog/blog.20161028_Setup_Vagrant_Homestead' => array( 'template' => 'blog.20161028_Setup_Vagrant_Homestead.twig',
                                                             'params' => array( 'bannertext' => 'Good news, everyone!',
                                                                                'headline' => 'Setup Vagrant Homestead' ),
                                                            'date' => '2016-10-28',
                                                            'priority' => 0.75
    ),
    '/blog/blog.20161025_Vegane_Sucuk' => array( 'template' => 'blog.20161025_Vegane_Sucuk.twig',
                                                             'params' => array( 'bannertext' => 'Good news, everyone!',
                                                                                'headline' => 'Vegane Sucuk' ),
                                                 'date' => '2016-10-25',
                                                 'priority' => 0.8
    ),
    '/blog/blog.20160412_Remove_checkout_title_from_woocommerce' => array( 'template' => 'blog.20160412_Remove_checkout_title_from_woocommerce.twig',
                                                             'params' => array( 'bannertext' => 'Good news, everyone!',
                                                                                'headline' => 'Remove checkout title from woocommerce' ),
                                                                           'date' => '2016-04-12',
                                                                           'priority' => 0.5
    ),
    
    '/blog/blog.20160129_Three.js_Basic_Scene_Setup' => array( 'template' => 'blog.20160129_Three.js_Basic_Scene_Setup.twig',
                                                             'params' => array( 'bannertext' => 'Good news, everyone!',
                                                                                'headline' => 'Three.js Basic Scene Setup' ),
                                                               'date' => '2016-01-29',
                                                               'priority' => 0.75                                                         
    ),
    '/blog/blog.20160129_Gender_Select_Options' => array( 'template' => 'blog.20160129_Gender_Select_Options.twig',
                                                             'params' => array( 'bannertext' => 'Good news, everyone!',
                                                                                'headline' => 'Gender Select Options' ),
                                                          'date' => '2016-01-29',
                                                          'priority' => 0.5
    ),
    '/blog/blog.20160129_Custom_styling_for_ordered_lists_with_CSS3' => array( 'template' => 'blog.20160129_Custom_styling_for_ordered_lists_with_CSS3.twig',
                                                             'params' => array( 'bannertext' => 'Good news, everyone!',
                                                                                'headline' => 'Custom styling for ordered lists with CSS3' ),
                                                                               'date' => '2016-01-29',
                                                                               'priority' => 0.5
    ),
    '/blog/blog.20151117_Javascript_Minimizer_Bash_Script' => array( 'template' => 'blog.20151117_Javascript_Minimizer_Bash_Script.twig',
                                                             'params' => array( 'bannertext' => 'Good news, everyone!',
                                                                                'headline' => 'Javascript Minimizer Bash Script' ),
                                                                     'date' => '2015-11-17',
                                                                     'priority' => 0.5
    ),
    '/blog/blog.20151026_Setting_up_GPG' => array( 'template' => 'blog.20151026_Setting_up_GPG.twig',
                                                   'params' => array( 'bannertext' => 'Good news, everyone!',
                                                                      'headline' => 'Setting up GPG' ),
                                                   'date' => '2015-10-26',
                                                   'priority' => 0.5
    ),
    '/blog/blog.20150422_my_basic_html_template' => array( 'template' => 'blog.20150422_my_basic_html_template.twig',
                                                   'params' => array( 'bannertext' => 'Good news, everyone!',
                                                                      'headline' => 'My Basic HTML Template' ),
                                                           'date' => '2015-04-22',
                                                           'priority' => 0.95
    ),
    '/blog/blog.20150326_Booting_my_PC_remotely_using_a_RaspberryPi' => array( 'template' => 'blog.20150326_Booting_my_PC_remotely_using_a_RaspberryPI.twig',
                                                             'params' => array( 'bannertext' => 'Good news, everyone!',
                                                                                'headline' => 'Booting my PC remotely using a Raspberry PI' ),
                                                                               'date' => '2015-03-26',
                                                                               'priority' => 0.5
    ),
    '/blog/blog.20141102_Howto_setup_your_GPG' => array( 'template' => 'blog.20141102.Howto_setup_your_GPG.twig',
                                                             'params' => array( 'bannertext' => 'Good news, everyone!',
                                                                                'headline' => 'How to setup your GnuPG (GPG) keys' ),
                                                         'date' => '2014-11-02',
                                                         'priority' => 0.5
    ),
    '/blog/blog.20140929_Howto_Fix_shellshock_on_debian_squeeze' => array( 'template' => 'blog.20140929_Howto_Fix_shellshock_on_debian_squeeze.twig',
                                                             'params' => array( 'bannertext' => 'Good news, everyone!',
                                                                                'headline' => 'How to fix shellshock on Debian Squeeze' ),
                                                                           'date' => '2014-09-29',
                                                                           'priority' => 0.5
    ),
    '/blog/blog.20130203_raspi_wlan' => array( 'template' => 'blog.20130203_raspi_wlan.twig',
                                                             'params' => array( 'bannertext' => 'Good news, everyone!',
                                                                                'headline' => 'Setting up wireless networking on my Raspberry Pi' ),
                                               'date' => '2013-02-03',
                                               'priority' => 0.5
    )
);	