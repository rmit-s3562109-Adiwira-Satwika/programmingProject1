# programmingProject1

# Testing seed instructions
In order to seed the database for testing open a command console in the project file and enter the following commands;

php artisan migrate:rollback

php artisan migrate

php artisan db:seed --class=ShareCodesSeeder


Note: this will remove all previous additions to database 
