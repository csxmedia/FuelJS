#FuelJS

##Documentation

FuelPHP is sweet. Backbone.JS is sweet. RequireJS is pretty sweet too. Bootstrap is awesome, right? Well, if you've ever wanted to play around with a one-page website then you're in the right place. This little doc will get you started with a ready to go project.

I've created a few small projects with FuelPHP + Backbone and the foundation is always the same: Add FuelPHP + MySQL + a few Javascript Libs. Then you've got to create the user model, create the controllers & views, add authentication, create the migration, write the javascript stuff to start the applciation, etc etc. Well, most of the projects upto the user authentication are almost always identicle. So, I've got a minimal working setup and am going talk about it here. 

Here's a list of what we'll be using:

* [FuelPHP](http://fuelphp.com/) v1.2.1
* [Backbone](http://backbonejs.org/) v0.9.2
* [Underscore](http://documentcloud.github.com/underscore/) v1.3.3
* [json2](https://github.com/douglascrockford/JSON-js)
* [RequireJS](http://requirejs.org/) v2.0.5
* [Text Plugin](http://requirejs.org/docs/download.html#text)
* [jQuery](http://jquery.com/) v1.8.0
* [Bootstrap](http://twitter.github.com/bootstrap/) v2.0.4
* [MySQL](http://mysql.com/)
 
I've divided up this project into four main parts, here's a small description of what I intend to capture at each stage

* Part 1 - The Project - This step establishes the base of our project. Download & Configure FuelPHP,  add the CSS and JS libs and other helper files.
* Part 2 - The Backend - We configure FuelPHP, add the controllers and views required to render our site
* Part 3 - The Frontend - This is where most of the JS magic happens. I've isolated all of the Javascript out to this section and I'm guessing a large writeup will be dedicated to it.
* Part 4 - The Database - Here we finalize our system, create the tables and populate is using FuelPHP Migrations

##Part 1: The Project
Not a lot needs to be said in this part I think. You can read the detailed intructions on how to setup & install FuelPHP here: [docs.fuelphp.com](http://docs.fuelphp.com/). We begin by installing FuelPHP and removing the older version of Bootstrap files as described below: 
>* Download & Setup your project: [FuelPhp v1.2.1](https://github.com/downloads/fuel/fuel/fuelphp-1.2.1.zip)
>* Remove/hide index.php from url: `'index_file' => false,`
>* Update the [timezone](http://php.net/manual/en/timezones.php): `'default_timezone'   => 'America/Los_Angeles',`  
>* run `php oil refine install` 
>* Create & Test local site, you should see the standard FuelPHP Welcome page  

FuelPHP 1.2.1 ships with an older version of Bootstrap, which we'll remove:

>* Delete `public/assets/js/bootstrap.js`
>* Delete `public/assets/css/bootstrap.css`

Now its time to add Bootstrap, [download](http://twitter.github.com/bootstrap/assets/bootstrap.zip) and move the files accordinly:

>* Copy `css/bootstrap-responsive.css` to `public/assets/css/`
>* Copy `css/bootstrap-responsive.min.css` to `public/assets/css/`
>* Copy `css/bootstrap.css` to `public/assets/css/`
>* Copy `css/bootstrap.min.css` to `public/assets/css/`
>* Copy `img/glyphicons-halflings-white.png` to `public/assets/img/glyphicons-halflings-white.png`
>* Copy `img/glyphicons-halflings.png` to `public/assets/img/glyphicons-halflings.png`

That takes care of the images and the css, we still need to move bootstrap.js over. There are quite a few Javascript libraries that we need to add in addition to bootstrap.js.

>* Create the js/libs folder: `public/assets/js/libs`
>* From Bootstrap downloaded earlier, copy `js/bootstrap.js` to `/public/assets/js/libs/`
>* Download [require.js](http://requirejs.org/docs/release/2.0.5/comments/require.js) and put it in `/public/assets/js/libs/`
>* Download the plugin [text.js](https://raw.github.com/requirejs/text/latest/text.js) and put it in `/public/assets/js/libs/`
>* Download [backbone.js](http://backbonejs.org/backbone.js) and put it in `/public/assets/js/libs/`
>* Download [underscore.js](http://underscorejs.org/underscore.js) and put it in `/public/assets/js/libs/`
>* Download [jquery.js](http://code.jquery.com/jquery-1.8.0.js) and put it in `/public/assets/js/libs/`
>* Download [json2.js](https://raw.github.com/douglascrockford/JSON-js/master/json2.js) and put it in `/public/assets/js/libs/`

At this point, FuelPHP should still render the welcome page. 

##Part 2: The Backend

We use the REST functionality provided by FuelPHP to drive most of our backend. The authentication is going to be handeled by the [SimpleAuth](http://docs.fuelphp.com/packages/auth/intro.html) example driver. We're going to copy the files into our app folder and customize it according to our needs. We also make sure of the [Object Relational Mapper](http://docs.fuelphp.com/packages/orm/intro.html), commonly referred to as ORM. 

We begin by editing `fuel/app/config/config.php`:
	
>* Enable the **auth** by adding `auth` to the `packages` array
>* Enable the **orm** by adding `orm` to the `packages` array
>* Update database config by editing `fuel/app/config/development/db.php`

Then we copy of the config files for [SimpleAuth](http://docs.fuelphp.com/packages/auth/intro.html)

>* Copy `fuel/packages/auth/config/auth.php` to `fuel/app/config/auth.php` and customize if desired
>* Copy `fuel/packages/auth/config/simpleauth.php` to `fuel/app/config/simpleauth.php` and customize if 	desired

Next, copy the SimpleAuth implementation over to the app folder incase we need to customize it:

>* Copy `fuel/packages/auth/classes/auth/acl/simpleacl.php` to `fuel/app/classes/auth/acl/simpleacl.php`
>* Copy `fuel/packages/auth/classes/auth/group/simplegroup.php` to `fuel/app/classes/auth/group/simplrgroup.php`
>* Copy `fuel/packages/auth/classes/auth/login/simpleauth.php` to `fuel/app/classes/auth/login/simplegroup.php`
    	
The next step is to create the user [model](http://docs.fuelphp.com/general/models.html).

```php
class Model_User extends Orm\Model {
    protected static $_properties = array(
        'id',
        'fullname',
        'username',
        'password',
        'email',
        'profile_fields',
        'group',
        'last_login',
        'login_hash',
        'enabled',
        'verified',
        'deleted'
    );
}
```
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


##Part 3: The Frontend
##Part 4: The Database


****
****
#How to reproduce this project from scratch:

##Part 1: The Project

* We begin by installing setting up FuelPHP:
	* Download & Setup your project: [FuelPhp v1.2.1](https://github.com/downloads/fuel/fuel/fuelphp-1.2.1.zip)  
	* run `php oil refine install` 
	* Create & Test local site, you should see the standard FuelPHP Welcome page    

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

