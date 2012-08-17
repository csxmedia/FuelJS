#FuelJS

This is the documentation of a boilerplate framework I've used a few times now to build Javascript based REST Applications with a FuelPHP + Mysql backend. Here's a list of what we'll be using:

* FuelPHP 1.2.1  
 * BackboneJS  
Underscore  
json2  
RequireJS
Text Plugin
jQuery
Bootstrap by Twitter  
MySQL  


****
****

##Part 1: The Project

* We begin by installing setting up FuelPHP:
	* Download & Setup your project: [FuelPhp v1.2.1](https://github.com/downloads/fuel/fuel/fuelphp-1.2.1.zip)  
	* run `php oil refine install` 
	* Create & Test local site, for example: http://fueljs.lo - you should see the standard FuelPHP Welcome page    

* FuelPHP includes an older version of Bootstrap which we'll replace. I removed the following files:
	* Delete `public/assets/js/bootstrap.js`
	* Delete `public/assets/css/bootstrap.css`
	* Delete `public/assets/css/bootstrap-LICENSE`

* Download [Bootstrap](http://twitter.github.com/bootstrap/assets/bootstrap.zip) and move the files:
 	* Copy `css/bootstrap-responsive.css` to `public/assets/css/`
	* Copy `css/bootstrap-responsive.min.css` to `public/assets/css/`
	* Copy `css/bootstrap.css` to `public/assets/css/`
	* Copy `css/bootstrap.min.css` to `public/assets/css/`
	* Copy `img/glyphicons-halflings-white.png` to `public/assets/img/glyphicons-halflings-white.png`
	* Copy `img/glyphicons-halflings.png` to `public/assets/img/glyphicons-halflings.png`
	
* Add the Javascript libraries
	* Create the js/libs folder: `public/assets/js/libs`
	* From Bootstrap downloaded earlier, copy `js/bootstrap.js` to `/public/assets/js/libs/`
	* Download [require.js](http://requirejs.org/docs/release/2.0.5/comments/require.js) and put it in `/public/assets/js/libs/`
	* Download the plugin [text.js](https://raw.github.com/requirejs/text/latest/text.js) and put it in `/public/assets/js/libs/`
	* Download [backbone.js](http://backbonejs.org/backbone.js) and put it in `/public/assets/js/libs/`
	* Download [underscore.js](http://underscorejs.org/underscore.js) and put it in `/public/assets/js/libs/`
	* Download [jquery.js](http://code.jquery.com/jquery-1.8.0.js) and put it in `/public/assets/js/libs/`
	* Download [json2.js](https://raw.github.com/douglascrockford/JSON-js/master/json2.js) and put it in `/public/assets/js/libs/`

* Configure FuelPHP, edit `fuel/app/config/config.php` and change:
	* Remove/hide index.php from url: `'index_file' => false,`
	* Update the [timezone](http://php.net/manual/en/timezones.php): `'default_timezone'   => 'America/Los_Angeles',`  	
	* Enable the **auth** by adding `auth` to the `packages` array
	* Enable the **orm** by adding `orm` to the `packages` array
	* Update database config by editing `fuel/app/config/development/db.php`

**SimpleAuth** See the following link for more information: <http://docs.fuelphp.com/packages/auth/intro.html>  

* Im going to use the example authentication driver, SimpleAuth, as shipped with FuelPHP and customize it according to my needs.
	* Copy `fuel/packages/auth/config/auth.php` to `fuel/app/config/auth.php` and customize if desired
	* Copy `fuel/packages/auth/config/simpleauth.php` to `fuel/app/config/simpleauth.php` and customize if 	desired
	* Copy SimpleAuth from packages over to our app so we can customize it if required:
    	* Copy `fuel/packages/auth/classes/auth/acl/simpleacl.php` to `fuel/app/classes/auth/acl/simpleacl.php`
    	* Copy `fuel/packages/auth/classes/auth/group/simplegroup.php` to `fuel/app/classes/auth/group/simplrgroup.php`
    	* Copy `fuel/packages/auth/classes/auth/login/simpleauth.php` to `fuel/app/classes/auth/login/simplegroup.php`
    	
****
****

##Part 2: The Backend

* Lets setup the FuelPHP backend:
	* Create the user model: `fuel/app/classes/model/user.php`
	* Create a `Common` controller: `fuel/app/classes/controller/common.php`
	* Add a new user controller by adding `fuel/app/classes/controller/user.php`
	* Add a new controller: `fuel/app/classes/controller/site.php`
	* Add a new template: `fuel/app/views/template.php`
	* Add a new view: `fuel/app/views/site/index.php`
	* Add a new view: `fuel/app/views/site/login.php`
	* Add/Update the routes by editing: `fuel/app/config/routes.php`
    	* `'_root_'  => 'site/index',`
    	* `'login'   => 'site/login',`   
    	* `'logout'  => 'site/logout',`
    	* `'check'   => 'user/check',`

****
****

##Part 3: The Frontend  
* Lets setup the Javascript code responsible for our frontend:
	* Add `public/assets/js/login.js`
	* Add `public/assets/js/main.js`
	* Add Desktop Application: `public/assets/js/desktop_app.js`
	* Add Desktop Router: `public/assets/js/desktop_router.js`
	* Add the user model: `public/assets/js/models/user.js`
	* Add the Views to `public/assets/js/views/`
	    * `desktop/dashboard/main.js`
	    * `desktop/home/main.js`
	    * `session.js`
	* Add the templates: `public/assets/templates/desktop/`
	    * `dashboard/main.html`
	    * `dashboard/sidebar.html`
	    * `dashboard/topbar.html`
	    * `home/main.html`
	    * `home/sidebar.html`
	    * `home/topbar.html`

****
****

##Part 4: The Database

* Create the database: Login to mysql and create database
* Create the migration: `fuel/app/migrations/001_create_users.php`
* Run the migration: `php oil refine migrate` (this will add an **admin/admin** account)

Thats it.
-----

#Documentation

I've used this formula for a few side projects now and everytime I've had to piece together the basic steps of starting a new project. Well, no more! I've documented the steps and dumped my thoughts on what I've done and why I've done it. Almoat all of my projects share these basic things: FuelPHP, MySQL, Backbone, Jquery, Bootstrap, etc.

This prject here is intended to be a Boilerplate example of how to setup a project. I hate the boilerplate nametag being used here as much as anyon, but the project itself isn't intended to be one. Whats important here is that I've documented the steps required to setup this kind of a project and explained my intentions as well as the decisions made.  'm not a developer by trade so the loss of knowledge is quite common for me as I switch back and forth from my usual role to a develper role. 

I've divided up this project into four main parts, here's a small description of what I intend to capture at each stage

* Part 1 - The Project - This step establishes the base of our project. FuelPHP is downloaded and configured to run in your environment. We add the CSS and JS libs and other helper files that we'll be using/
* Part 2 - The Backend - We configure FuelPHP, add the controllers and views required to render our site
* Part 3 - The Frontend - This is where most of the JS magic happens. I've isolated all of the Javascript out to this section and I'm guessing a large writeup will be dedicated to it.
* Part 4 - The Database - Here we finalize our system, create the tables and populate is using FuelPHP Migrations

##Part 1: The Project
##Part 2: The Backend
##Part 3: The Frontend
##Part 4: The Database

## The Backend
The backend consists of the following pieces:
* the common controller: `fuel/app/classes/controller/common.php`
* the site controller: 

## The Frontend