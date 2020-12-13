<p align="center"><a href="#" target="_blank"><img src="https://i.imgur.com/seWSaNy.png" width="400"></a></p>


## About Robusta Bus WebAPI

Robusta Bus WebApi is a Laravel work-in-progress project build for bus reservation system which can be used by any platform (web, Mobile, .etc).

##Pre-requisites

- [PHP](https://www.php.net/downloads.php).
- [PHP Composer](https://getcomposer.org/download/).
- [Laravel 8](https://laravel.com/docs/8.x/installation).
- [MySql](https://www.mysql.com/downloads/).
- [Laravel Passport](https://laravel.com/docs/8.x/passport).
- [Postman](https://www.postman.com/downloads/) --optional.


## Installation

- create database robustabus.
- git clone  https://github.com/AhmedSaadHarmoush/RobustaBus.git
- After project download is complete map to the root of your project.
- Copy database credintials to .env
```
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=robustabus
  DB_USERNAME=user
  DB_PASSWORD=yourpassword
```
- migrate the database using:
```
php artisan migrate
```
- install a passport to your project to get apiKey
```
php artisan passport:install
```
- copy key details to your .env
```
PASSPORT_PERSONAL_ACCESS_CLIENT_ID=""
PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET=""
```
- run the application locally using:
```
php artisan serve
```

## How to use

you can either use the postman collection in the repository, or you can follow the following:

- perform a registration post request using /api/register with the following mandatory fields:
```JSON
{
    "name": "name",
    "email": "name@robusta.com",
    "password":"123456",
    "password_confirmation":"123456"
}
```
- perform a login post request using /api/login with the following mandatory fields:
```JSON
{
    "email": "name@robusta.com",
    "password":"123456",
    "password_confirmation":"123456"
}
```
- save the returned key as it's needed for next steps.
- get the available seats on a specific trip using post request to api/availablebookings with authorization of type Bearer Token and insert the returned key in the Token. and note that the following input is mandatory:
```JSON
{
"tripId":1,
"startCityId":18,
"endCityId":11
}
```
- Note that cityId can be retrieved from the city model using a get request to api/cities with authorization.
- Also Note that test data has been already inserted and a full list of city/governorate already migrated to database.
- the response returned will indicate each seat and whether it's available or not.
- Add a new booking using a post request to api/booking with authorization with the following mandatory attributes:
```JSON
{
"tripId":1,
"startCityId":18,
"endCityId":11,
"seatId":1
}
```
- Note that the seatId is the seat number in bus from 1 to 12.
- you can request the available seats now and see that this seat has been marked as not available (Booked).

##Work in progress

the following points are still under development:

- the remaining CRUD operations for the used Models.
- Access control using the user_group table to make policy foreach group.
- using fortify to implement same access control using Teams.
- implementing the UI for the frontend application.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
