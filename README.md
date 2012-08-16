FuelJS
======

A boilerplate to build Javascript / REST Applications with FuelPHP + MySQL as the backend

We'll be using:

* FuelPHP 1.2.1
* BackboneJS
* RequireJS

***

## Start:
* Download https://github.com/downloads/fuel/fuel/fuelphp-1.2.1.zip and extract
#### Checkpoint: https://github.com/jsidhu/FuelJS/tree/d5b9505a4ca0290ca46a3a3de0c7616bf90e21b3
* run 'php oil refine install'
* Create & Test local site, for example: http://fueljs.lo
    * you should see the standard FuelPHP Welcome page
* FuelPHP includes an older version of Bootstrap, I removed the following files:
    Delete public/assets/js/bootstrap.js
   	Delete public/assets/css/bootstrap.css
   	Delete public/assets/css/bootstrap-LICENSE
* Create the libs folder: public/assets/js/libs
* Download Bootstrap from http://twitter.github.com/bootstrap/assets/bootstrap.zip and move the files:
	* Copy css/bootstrap-responsive.css to public/assets/css/
	* Copy css/bootstrap-responsive.min.css to public/assets/css/
	* Copy css/bootstrap.css to public/assets/css/
	* Copy css/bootstrap.min.css to public/assets/css/
	* Copy img/glyphicons-halflings-white.png to public/assets/img/glyphicons-halflings-white.png
	* Copy img/glyphicons-halflings.png to public/assets/img/glyphicons-halflings.png
	* Copy js/bootstrap.js to /public/assets/js/libs/
	* Copy js/bootstrap.min.js to /public/assets/js/libs/

* Download require.js from http://requirejs.org/docs/release/2.0.5/comments/require.js and put it in /public/assets/js/libs/
* Download the text plugin from https://raw.github.com/requirejs/text/latest/text.js for require.js and put it in /public/assets/js/libs/
* Download backbone.js from http://backbonejs.org/backbone.js and put it in /public/assets/js/libs/
* Download underscore.js from http://underscorejs.org/underscore.js and put it in /public/assets/js/libs/
* Download jquery.js from http://code.jquery.com/jquery-1.8.0.js and put it in /public/assets/js/libs/
* Download json2.js from https://raw.github.com/douglascrockford/JSON-js/master/json2.js and put it in /public/assets/js/libs/

#### Checkpoint: https://github.com/jsidhu/FuelJS/tree/15b719820457f1c293294c263cb7aa952ec27c36

* Configure FuelPHP, edit fuel/app/config/config.php and change:
    * 'index_file'  => false,
    * 'default_timezone'   => 'America/Los_Angeles',   Find it here: http://php.net/manual/en/timezones.php
    * Enable the auth package by editing fuel/app/config/config.php and add 'auth' to the packages array
    * Enable the orm package by editing fuel/app/config/config.php and add 'orm' to the packages array
    * Update Database config by editing fuel/app/config/development/db.php

### SimpleAuth - http://docs.fuelphp.com/packages/auth/intro.html
* Copy fuel/packages/auth/config/auth.php to fuel/app/config/auth.php and make changes (update the salt?)
* Copy fuel/packages/auth/config/simpleauth.php to fuel/app/config/simpleauth.php and customize if desired
* Copy:
    * fuel/packages/auth/classes/auth/acl/simpleacl.php -> fuel/app/classes/auth/acl/simpleacl.php
    * fuel/packages/auth/classes/auth/group/simplegroup.php -> fuel/app/classes/auth/group/simplrgroup.php
    * fuel/packages/auth/classes/auth/login/simpleauth.php -> fuel/app/classes/auth/login/simplegroup.php

### ORM - in order to proceed further, we need to define our User model..
* Create fuel/app/classes/model/user.php
* Create the migration:fuel/app/migrations/001_create_users.php
* Create the database!
* Run the migration: php oil refine migrate

### SimpleAuth Continued
* Add a Common Controller - fuel/app/classes/controller/common.php
* Add a new method to site controller, action_login in fuel/app/classes/controller/site.php
* Add a new view, fuel/app/views/site/login.php
* Add a new route by editing fuel/app/config/routes.php: 'login'   => 'site/login',

### Views
* Add a new controller by creating a new file: fuel/app/classes/controller/site.php
* Add a new template, fuel/app/views/template.php
* Add a new view by creating a new file: fuel/app/views/site/index.php
* Add a new view by creating a new file: fuel/app/views/site/login.php
* Add/Update the routes by editing fuel/app/config/routes.php:
    * '_root_'  => 'site/index',   // The default route
    * 'login'   => 'site/login',   // login page
    * 'logout'   => 'site/logout', // logout
    * 'check'   => 'site/check',   // checks a posted username/password

* Now test, you should get the /login view asking you to login with a username and password. Login using admin/admin will work but you will end up at a non-working page.

#### Checkpoint: https://github.com/jsidhu/FuelJS/tree/cc71e41e8fc560a913b995cf385f727e6e2d0008

### Javascript everything
