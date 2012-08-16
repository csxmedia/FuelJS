<?php
return array(
	'_root_' => 'site/index',  // The default route
    'login'  => 'site/login',
    'check'  => 'user/check',
    'logout' => 'site/logout',
    '_404_'  => 'welcome/404',    // The main 404 route
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello')
);