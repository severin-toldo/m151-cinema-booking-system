# m151-cinema-booking-system
 

## 1) Requirements:

- [composer](https://getcomposer.org/) installed
- MySql Server installed and running


## 2) Setup Project

1) Clone repo

2) `cd path/to/project`

3) `composer install`


## 3) Setup Doctrine and Database

1) Open file `config/packages/doctrine.yaml`

2) replace `YOUR_USER` with your user (ex. root)

3) replace `YOUR_PASSWORD` with your password (ex. 1234)

4) replace `YOUR_SERVER_VERSION` with your server version (run `mysql -u root -p` in your terminal to find out server version)

5) save file

6) Execute file `resources/1_db_ddl.sql` on mysql server

7) Test Doctrine configuration: `php bin/console doctrine:query:sql "SELECT 1"`

8) Create entity tables: `bin/console doctrine:schema:update --force`

9) Execute file `resources/2_stored_procedures_events.sql` in database

10) Execute file `resources/3_data.sql` in database


## 4) Run the project:

`php bin/console server:run`

Server will now be available on (http://127.0.0.1:8000)

Admin user:
Email: admin@admin.com
PW: 123456

Employee user:
Email: employee@employee.com
PW: 123456

You can find more users in the table `user`. Their password is 123456


