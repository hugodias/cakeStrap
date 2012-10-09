# CakeStrap v 0.5
---
CakeStrap is a simple HTML5 Ready Bootstrap for CakePHP 2.2 Applications.


### Video tutorial ( Portuguese )
[http://youtu.be/m4FtYIS3Rm8][]
[http://youtu.be/m4FtYIS3Rm8]: http://youtu.be/m4FtYIS3Rm8


### Features
##### Front-end
1. Responsive Web Design
2. HTML5 Boilerplate v4.0.0
3. Normalize v1.0.1
4. Modernizr v2.6.1
5. Twitter Bootstrap v2.1.0
6. Multi-Language ( English and Portuguese )
7. Custom themes ( Bootswatch ) **(NEW)**

##### Back-end
1. CakePHP 2.2 Security Authentication
2. Users CRUD
3. Remember password with email send
4. Automatic inclusion of  javascript and css files depending of the current controller and action ( Tutorial below ) **(NEW)**


## Quick start

- Create a table named `users` in your database with the following structure:


<pre>CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `hash_change_password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
</pre>


- Open the file `app/Config/database.php` and change the database information
- Change the permissions of the folder `app/tmp` to 777 ( and all the folders inside of it )
- Change your app name and email in `app/Config/bootstrap.php` at line 149
- Change your SMTP email settings in `app/Config/email.php` at line 66


## Automatic inclusion of JS and CSS
CakeStrap has a JS and CSS folder structure allowing to automatic load files for each action of each controller.
For example, if you have this JS structure folder:

<pre>
/js
	/pages
		/home.js		
</pre>

This script will be automatic loaded when the user is in controller `pages` and in action `home`

The same structure exists for `CSS` files.

## Internationalization

Currently cakeStrap supports two languages, **English** and **Portuguese**. To enable the Portuguese language as the main just add the following line in your `app/Controllers/AppController.php` at `beforeFilter` action:
<pre>
Configure::write('Config.language', 'por');
</pre> 



## Questions / Bugs

Have a question or found a bug? Please create an issue [here][] on GitHub!
[here]: https://github.com/hugodias/cakestrap/issues
