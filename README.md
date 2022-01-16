## About Foodoose Project
First you have to inport your sql file to your database. and configure .env file. otherwise this project will not run
- [Main Website](http://www.fooddoose.com/).
- [laravel subdomain Website](http://app.fooddoose.com/).
## Useful Links
- [To use API please visit](https://docs.google.com/spreadsheets/d/1KfNngrf-RRwvBbWUAMMS22cEfQYF7Makekzm7v862hk/edit).

- [To use Flowchart please visit](https://drive.google.com/file/d/1-WuriRlHeebdNn8g3CSTFZzwoyQazrBc/view?ts=61af89b7).

- [To use Marchant Dashboard Concept please visit](https://www.figma.com/file/zblvAdEfWFPvlU8kX116w2/marchant-dashboard-FoodDoose?node-id=0%3A1).

- [Google map location select](https://github.com/s1modev/GoogleMaps_youtube).

## Login Credentials

1. Admin login url: app.foodoose.com/login
- Email : admin@gmail.com
- password: 12345678

## to run this project you have to follow this steps.please use php 7.4 version.
1. go to your project and open terminal
- composer install<br/>
- copy .env.example .env <br/>
- php artisan key:generate <br/>
- php artisan storage:link <br/>
- php artisan view:cache <br/>
- php artisan route:cache <br/>
- php artisan cache:cache <br/>
- php artisan config:cache <br/>
- php artisan optimize:clear <br/>
- composer dump-autoload
## to create migration files from database
- php artisan help migrate:generate for help or <br/>
- php artisan  migrate:generate to migrate <br/>
## used to create this project, I have used those following packages
- [Migration Generate](https://github.com/kitloong/laravel-migrations-generator). <br/>
- [For Video Tutorial Migration Generate](https://www.youtube.com/watch?v=eLybI4WPuWc).<br/>
- [Dom PDF Laravel](https://github.com/barryvdh/laravel-dompdf). <br/>
- [JWT Laravel](https://jwt-auth.readthedocs.io/en/docs/laravel-installation/). <br/>
- [Laravel Composer Toastr](https://github.com/brian2694/laravel-toastr).<br/>
- [Intervention Image](http://image.intervention.io/). <br/>
- [Sweet Alert](https://github.com/realrashid/sweet-alert). <br/>
- [Sweet Alert](https://github.com/realrashid/sweet-alert). <br/>
- [Yajrabox Laravel Databales](https://yajrabox.com/docs/laravel-datatables/master/installation). <br/>
