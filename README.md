FuelJS
======

A boilerplate to build Javascript / REST Applications with FuelPHP + MySQL as the backend

We'll be using:

* FuelPHP 1.2.1
* BackboneJS
* RequireJS

* Download https://github.com/downloads/fuel/fuel/fuelphp-1.2.1.zip and extract
    * https://github.com/jsidhu/FuelJS/tree/d5b9505a4ca0290ca46a3a3de0c7616bf90e21b3
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

### Check - Make sure nothing broke, here's my code upto this point: 

** Stackoverflow article/question on how to use Require.js with Backbone and other global libs
** http://stackoverflow.com/questions/10866740/loading-jquery-underscore-and-backbone-using-requirejs-2-0-1-and-shim

### Lets get a BootStrap Page Up and running with FuelPHP
* Edit fuel/app/config/config.php
    * 'index_file'  => false,
    * 'default_timezone'   => 'America/Los_Angeles',   Look here: http://php.net/manual/en/timezones.php
* Add a new controller by creating a new file: fuel/app/classes/controller/site.php
* Add a new view by created a new file: fuel/app/views/site/index.php
* Update the default route by editing fuel/app/config/routes.php:'_root_'  => 'site/index',
* Now test, you should see whatever was in your site/index.php view

### SimpleAuth - http://docs.fuelphp.com/packages/auth/intro.html
* Enable the auth package by editing fuel/app/config/config.php and add 'auth' to the packages array
* Copy fuel/packages/auth/config/auth.php to fuel/app/config/auth.php and make changes
* Copy fuel/packages/auth/config/simpleauth.php to fuel/app/config/simpleauth.php and make changes
* Copy:
    * fuel/packages/auth/classes/auth/acl/simpleacl.php -> fuel/app/classes/auth/acl/simpleacl.php
    * fuel/packages/auth/classes/auth/group/simplegroup.php -> fuel/app/classes/auth/group/simplrgroup.php
    * fuel/packages/auth/classes/auth/login/simpleauth.php -> fuel/app/classes/auth/login/simplegroup.php
* in order to proceed further, we need to define our User model..

### Models
* Make sure to edit config.php and add 'orm' to the packages list
* Create fuel/app/classes/model/user.php
* Create fuel/app/classes/model/collectioncenter.php
* Create fuel/app/classes/model/subdivision.php
* Create the migrations to create database tables

### Migrations
* 001_create_users.php
* 002_create_collectioncenters.php
* 003_create_subdivisions.php
* Run the migration, php oil refine migrate

### Auth Continued
* Add a Common Controller - fuel/app/classes/controller/common.php
* Add a new method to site controller, action_login in fuel/app/classes/controller/site.php
* Add a new view, fuel/app/views/site/login.php
* Add a new route by editing fuel/app/config/routes.php: 'login'   => 'site/login',

####Backboning the app, keep the following in mind:
* Add fuel/core/config/session.php to fuel/app/config/session.php and change cookie name