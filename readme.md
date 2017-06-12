# House Points Tracker #

Developed as an example app for my students, to show how a simple web app could operate. Potential to add to the school's intranet to drive students to want to earn the points, instead of them being arbitrarily assigned each week.

## Todo ##

#### General ####

 - [ ] Auth
 - [x] Load student search through API
 - [ ] Paginate student search
 - [x] Filter Find Students
 - [x] Add scores to houses
 - [x] Adding new score watcher on chart
 - [x] Show Exit button when Needed
 - [x] Setting active house from searching student
 - [x] Year / Week view toggle
 - [ ] Ditch bootstrap, try out Bulma or UIKit
 - [ ] Mobile Friendly

#### Admin ####

 - [ ] Manual score entry
 - [ ] Remove scores
 - [ ] Admin Grades / Houses etc
 - [ ] Excel sheet import / export for simple admin management

## Install ##
```
git clone https://michaelrtm@bitbucket.org/michaelrtm/housepoints.git
cd housepoints
composer install
php artisan migrate
php artisan db:seed
```
*Please note: Database seeds with the colours/houses for the school I currently work at*
