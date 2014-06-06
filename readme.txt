This project is done in php(yii framework) + mysql.

Setting up the project:

1) Install and configure apache, php, mysql (or xampp/lampp etc)

2) Place the project to your web root.

3) Run setup.sh to create necessary files and permissions. (./setup.sh from web root)

4) File ./env.php is configuration file for setting environment variable. If we have to change environment then change 'HTTP_HOST' value and return environment value. 
Mostly we won't need to edit this file except if we decide to add/change environments. 

5) Create a empty database for the project from phpMyAdmin or other MySql administration tools.

5) Open ./protected/config/main.php. Then set value for different environment_setting:
      $database (database name),
      $username (database user name), 
      $password (database password), 
      $admin_email (email address of admin), 
      $private_apiKey (stripe private api key), 
      $public_apiKey (stripe public api key), 
      $connectionString(database connection string) 

7) Open ./protected/config/console.php. Then set value of different variable for different environment setting similar to main.php in step 6.
