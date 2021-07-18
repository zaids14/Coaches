# Coaches
# API'S in PHP 
a)-I want to see which  coaches I can schedule with
b)-I want to see what 30 min time slots are available to schedule with a particular coach
c)-I want to book an appointment with a coach at one of their available times.
Stack used:-PHP,MySQL
Database name:-ab
Database table:-dataset
Database url -> http://localhost/phpmyadmin/index.php?route=/sql&db=ab&table=dataset&pos=0
Install a Xampp server
After installing run it and start the apache and mysql module.
Create a folder:-
url->xampp/htdocs/rest-api-crud-using-php
rest-api-crud-using-php->.htaccess
                       -> Coach.php
                       -> CoachRestHadler.php
                       ->dbcontroller.php
                       ->RestController.php
                       ->SimpleRest.php

To show all the records run this query:-
$query = 'SELECT * FROM dataset';

To show coaches name run this query:-
$query = 'SELECT * FROM dataset WHERE Name LIKE "%' .$name. '%"';

To show which coaches and day we can schedule run this query:-
$getQuery = "SELECT * FROM dataset where Name = '". $name . "' and day_of_week = '". $dayOfWeek ."' ";


For checking all record enter this url in postman workspace:-
// url -> coach/list -> List to fetch all record 
// url -> coach/list?name=John -> List to fetch all record with matched name in urlParam 

For checking if coaches are available:-
// url -> coach/create -> Insert coach record 
// body -> name, timezone, dayofweek, availableAt and availableUntil

For future reference we can add these :-
-We can delete the coach
-We can edit the coach
