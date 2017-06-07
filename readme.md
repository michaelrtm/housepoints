# House Points Tracker #

Developed as an example app for my students, to show how a simple web app could operate. Potential to add to the school's intranet to drive students to want to earn the points, instead of them being arbitrarily assigned each week.

## Todo ##


* Auth
* Admin interface to mangage houses / colours
* Clean up student search (ajax request after search params at least 3 chars)?
* Mobile view
* House histories?
* Captains

## Install ##
```
git clone https://michaelrtm@bitbucket.org/michaelrtm/housepoints.git
cd housepoints
composer install
php artisan migrate
php artisan db:seed
```