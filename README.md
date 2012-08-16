# FuelJS

This is the documentation of a boilerplate framework I've used a few times now to build Javascript based REST Applications with a FuelPHP + Mysql backend. Here's a list of what we'll be using:

* FuelPHP 1.2.1
* BackboneJS
* Underscore
* json2
* RequireJS + Text Plugin
* jQuery
* Bootstrap by Twitter
* MySQL

***

###Lets get started!

* We begin by installing setting up FuelPHP:
>
	* Download & Setup your project: <https://github.com/downloads/fuel/fuel/fuelphp-1.2.1.zip>  
	* run `php oil refine install` 
	* Create & Test local site, for example: http://fueljs.lo - you should see the standard FuelPHP Welcome page  

**Checkpoint: <https://github.com/jsidhu/FuelJS/tree/d5b9505a4ca0290ca46a3a3de0c7616bf90e21b3>**

* FuelPHP includes an older version of Bootstrap which we'll replace. I removed the following files:  
>
	* Delete `public/assets/js/bootstrap.js`
	* Delete `public/assets/css/bootstrap.css`
	* Delete `public/assets/css/bootstrap-LICENSE`

* Download Bootstrap from <http://twitter.github.com/bootstrap/assets/bootstrap.zip> and move the files:
>
 	* Copy `css/bootstrap-responsive.css` to `public/assets/css/`
	* Copy `css/bootstrap-responsive.min.css` to `public/assets/css/`
	* Copy `css/bootstrap.css` to `public/assets/css/`
	* Copy `css/bootstrap.min.css` to `public/assets/css/`
	* Copy `img/glyphicons-halflings-white.png` to `public/assets/img/glyphicons-halflings-white.png`
	* Copy `img/glyphicons-halflings.png` to `public/assets/img/glyphicons-halflings.png`
	
* Add the Javascript libraries
>
	* Create the js/libs folder: `public/assets/js/libs`
	* Copy `js/bootstrap.js` to `/public/assets/js/libs/`
	* Download `require.js` from <http://requirejs.org/docs/release/2.0.5/comments/require.js> and put it in `/public/assets/js/libs/`
	* Download the plugin `text.js` from <https://raw.github.com/requirejs/text/latest/text.js> for `require.js` and put it in `/public/assets/js/libs/`
	* Download `backbone.js` from <http://backbonejs.org/backbone.js> and put it in `/public/assets/js/libs/`
	* Download `underscore.js` from <http://underscorejs.org/underscore.js> and put it in `/public/assets/js/libs/`
	* Download `jquery.js` from <http://code.jquery.com/jquery-1.8.0.js> and put it in `/public/assets/js/libs/`
	* Download `json2.js` from <https://raw.github.com/douglascrockford/JSON-js/master/json2.js> and put it in `/public/assets/js/libs/`

**Checkpoint: <https://github.com/jsidhu/FuelJS/tree/15b719820457f1c293294c263cb7aa952ec27c36>**

* Configure FuelPHP, edit `fuel/app/config/config.php` and change:
>
	* Remove/hide index.php from url: `'index_file' => false,`
	* Update the timezone, see <http://php.net/manual/en/timezones.php>: `'default_timezone'   => 'America/Los_Angeles',`  	
	* Enable the auth by adding `auth` to the `packages` array
	* Enable the orm by adding `orm` to the `packages` array
	* Update Database config by editing `fuel/app/config/development/db.php`

**SimpleAuth** See the following link for more information: <http://docs.fuelphp.com/packages/auth/intro.html>  

* Im going to use the example authentication driver, SimpleAuth, as shipped with FuelPHP and customize it according to my needs.
>
	* Copy `fuel/packages/auth/config/auth.php` to `fuel/app/config/auth.php` and customize if desired
	* Copy `fuel/packages/auth/config/simpleauth.php` to `fuel/app/config/simpleauth.php` and customize if 	desired
	* Copy SimpleAuth from packages over to our app so we can customize it if required:
    	>
    	* Copy `fuel/packages/auth/classes/auth/acl/simpleacl.php` to `fuel/app/classes/auth/acl/simpleacl.php`
    	* Copy `fuel/packages/auth/classes/auth/group/simplegroup.php` to `fuel/app/classes/auth/group/simplrgroup.php`
    	* Copy `fuel/packages/auth/classes/auth/login/simpleauth.php` to `fuel/app/classes/auth/login/simplegroup.php`

**ORM (Object Relational Mapper):** <http://docs.fuelphp.com/packages/orm/intro.html>

* I'm going to be using the ORM package provided by FuelPHP:
>
	* Create the user model: `fuel/app/classes/model/user.php`
	* Create the migration: `fuel/app/migrations/001_create_users.php`

* Create the Database and populate it:
>
	* Create the database, this step is manual: Login to mysql and create database
	* Run the migration: `php oil refine migrate` (this will add an `admin/admin` account)

### The backend

* Lets setup the FuelPHP backend:
>
	* Create a `Common` controller: `fuel/app/classes/controller/common.php`
	* Add a new user controller by adding `fuel/app/classes/controller/user.php`
	* Add a new controller: `fuel/app/classes/controller/site.php`
	* Add a new template: `fuel/app/views/template.php`
	* Add a new view: `fuel/app/views/site/index.php`
	* Add a new view: `fuel/app/views/site/login.php`
	* Add/Update the routes by editing: `fuel/app/config/routes.php`
    	>
    	* `'_root_'  => 'site/index',`
    	* `'login'   => 'site/login',`   
    	* `'logout'  => 'site/logout',`
    	* `'check'   => 'user/check',`

**Checkpoint: <https://github.com/jsidhu/FuelJS/tree/cc71e41e8fc560a913b995cf385f727e6e2d0008>**

### The frontend

* Lets setup the Javascript code responsible for our frontend:
>
	* Add `public/assets/js/login.js`
	* Add `public/assets/js/main.js`
	* Add Desktop Application: `public/assets/js/desktop_app.js`
	* Add Desktop Router: `public/assets/js/desktop_router.js`
	* Add the user model: `public/assets/js/models/user.js`
	* Add the Views to `public/assets/js/views/`
	    >
	    * `desktop/dashboard/main.js`
	    * `desktop/home/main.js`
	    * `session.js`
	* Add the templates: `public/assets/templates/desktop/`
		>
	    * `dashboard/main.html`
	    * `dashboard/sidebar.html`
	    * `dashboard/topbar.html`
	    * `home/main.html`
	    * `home/sidebar.html`
	    * `home/topbar.html`

Thats it, should be working.

Whats happening here?