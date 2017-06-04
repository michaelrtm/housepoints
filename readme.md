# House Points Tracker #

Developed as an example app for my students, to show how a simple web app could operate. Potential to add to the school's intranet to drive students to want to earn the points, instead of them being arbitrarily assigned each week.

## Todo ##

* Auth
* Mobile view
* Clean up student search (ajax request after search params at least 3 chars)?
* Admin interface to mangage houses / colours
* House histories?
* Captains

## Install ##
```
copy repo
composer install
php artisan migrate
php artisan db:seed
```