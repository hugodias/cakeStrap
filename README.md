# CakeStrap v 0.3
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

##### Back-end
1. CakePHP 2.2 Security Authentication
2. Users CRUD



## Quick start

- Create a table named `users` in your database with the following structure:


<pre>CREATE TABLE users (
id int(11) NOT NULL AUTO_INCREMENT,
username varchar(255) NOT NULL,
password varchar(255) NOT NULL,
name varchar(255) NOT NULL,
role varchar(20) NOT NULL,
created datetime NOT NULL,
modified datetime NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
</pre>


- Open the file `app/Config/database.php` and change the database information
- Change the permissions of the folder `app/tmp` to 777 ( and all the folders inside of it )



## Internationalization

Currently cakeStrap supports two languages, **English** and **Portuguese**. To enable the Portuguese language as the main just add the following line in your `app/Controllers/AppController.php` at `beforeFilter` action:
<pre>
Configure::write('Config.language', 'por');
</pre> 



## Questions / Bugs

Have a question or found a bug? Please create an issue [here][] on GitHub!
[here]: https://github.com/hugodias/cakestrap/issues
