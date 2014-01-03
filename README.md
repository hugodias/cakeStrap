# CakeStrap v 0.7.1
---
CakeStrap is a simple HTML5 Ready Bootstrap for CakePHP 2.4.1 Applications.


### Video tutorial ( Portuguese )
[http://youtu.be/m4FtYIS3Rm8][]
[http://youtu.be/m4FtYIS3Rm8]: http://youtu.be/m4FtYIS3Rm8


### Features
##### Front-end
1. Responsive Web Design
2. jQuery 1.10.2 Stable **(NEW)**
3. Modernizr
5. Twitter Bootstrap v3.0.0 **(NEW)**
6. Multi-Language ( English and Portuguese )

##### Back-end
1. CakePHP 2.4.1 Security Authentication **(NEW)**
2. Users CRUD
3. Remember password with email send
4. Automatic inclusion of  javascript and css files depending of the current controller and action ( Tutorial below )


##### Modules
1. [Photos end videos gallery](https://github.com/hugodias/CakeStrap-Manager-Module)


## Quick start

- [Download](https://github.com/hugodias/cakeStrap/archive/master.zip) or clone this repository
- Extract the cakeStrap folder in your web server
- Go to [http://localhost/cakeStrap](http://localhost/cakeStrap) and follow the instructions

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

## Deploy
[Lee Graham](https://github.com/leegraham) created a easy way do deploy CakeStrap to OpenShift, check it out: [cakeStrap Openshift](https://github.com/leegraham/cakeStrap-example)

## Questions / Bugs

Have a question or found a bug? Please create an issue [here][] on GitHub!
[here]: https://github.com/hugodias/cakestrap/issues
