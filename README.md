# admin_panel

Project Summary :

As mentioned,

I have developed two Laravel projects.
* Article Website (User-facing)
* Admin Panel (For managing articles)

Versions:
Laravel: 12.4.1
PHP: 8.2.12

Admin Panel:

* For login credential, get it from CreateUsersSeeder seeder file.
* For both project i used same database (DB name: w2s_articles).
* For Authentication i have used laravel's inbuilt auth middleware.
* For users, i have created seeder to seed the users with credentials and roles details. I have created the RoleEnum for define user roles as an enum (1 is admin, 2 is sub-admin).
* For Model, i have created two ( Article, User).
* For Roles and Permission, Used Gates to check user roles. For this i have created service provider to boot the Gates. registered this service provider in bootstrap/providers
* Resitricted date and time should be future only. Restricted the date and time field only while editing the article (already published article).The date field is disabled if the article is already published.
* For Get images from admin panel project i set the url in config app file like 'ADMIN_URL' => 'http://127.0.0.1:8002/storage/', so run the admin panel in port 8002. (in product need permission for file access)
* Run different ports for both project article project (php artisan serve --port=8001), admin panel (php artisan serve --port=8002).
* The scheduler will run everyminute to check if scheduled article exist. if article exist, it will publish the article. 

The Commands to run:

php artisan migrate
php artisan db:seed --class=CreateUsersSeeder
php artisan schedule:work


