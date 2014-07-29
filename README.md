# Gone! Challenge

### Introduction

This challenge consists in creating a simple project using Symfony PHP­based framework for backend and JavaScript for templating.

### Objective

This system aims to provide Gone! operators a lightweight tool which they’ll use for checking boxes and products information and change their status based in real­life events.

### Definition

The user starts by creating a box and adding products to it. Gone! later makes an offer for that box. The user can accept or decline that offer.
If the offer is declined, the flow ends there. If it's accepted, a pickup has to be scheduled. Once accepted, the offer is locked and cannot be changed later. After being picked up, the box is in transit until is later delivered to the warehouse, where the flow ends.
It could happen that the pickup could not be completed. In that case, a new pickup must be scheduled.

### API

* This API is how the frontend will require data asynchronously to the backend.
* Must be RESTful and is up to the challenger what endpoints need to be created to fulfill
the challenge objectives.
* Database structure is up to the challenger to design.
* Database engine/service is decided by the challenger, but it should be simple for us to
connect later when testing the project.

### Frontend

UI must be developed in JavaScript, using Angular.js or Backbone.js as a framework and Bootstrap for templating following single page application structure.

### Installation

* Make a local copy of the repo on your computer
* Create a new mySQL database called challenge_db and dump in the file challenge_db_dump.sql located on the root of the repo.
* Using the command line tool go to the project root and execute this:
```$ composer install```
* When promped, provide the mySQL database information, root : challenge_admin, password : admin
* After this we need to navigate into the folder /tools located on the root using the command line
* Now we are going to install node and npm if we don't have them
```$ brew install node```
```$ curl https://npmjs.org/install.sh | sh```
* Next, we run the npm install, it will install Handlebars
```$ npm install```
* After that we are ready to compile the Handlebars templates, run the buils script located in tools
```$ ./build.sh```

* Now we are all set, you can move the app into production by executing the following commands:
```php app/console cache:clear --env=prod --no-debug```
```php app/console assets:install web```
```php app/console assetic:dump web```

* To start navigating go to 
```development address -> localhost/path-to-project/web/app_dev.php/dashboard/```
```production address  -> localhost/path-to-project/web/dashboard/```
