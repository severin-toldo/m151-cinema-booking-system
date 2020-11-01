# m151-cinema-booking-system
 

## 1) Requirements:

- [composer](https://getcomposer.org/) installed
- [npm](https://www.npmjs.com/) installed
- MySql Server installed and running


## 2) Setup Project

1) Clone repo

2) `cd path/to/project`

3) `composer install`

4) `npm install`

5) `npm run dev`


## 3) Setup Doctrine and Database

This project works with multiple SQL Servers, a (Master / Slave) Setup.
The `doctrine.yaml` structure is predefined for a Master / Slave setup.

**Please change the `config/packages/doctrine.yaml` to fit your needs / setup.**

### Master / Slave Setup

1) Create a database (example sql in `resources/1_db_ddl.sql`) on your Master Server

2) Add `Server-Id = 1` and `Log-bin=mysql-bin` to your Master MySQL Servers config files (ex. `mysql.ini`, `my.cnf`)

3) Add `Server-Id = YOUR_SLAVE_ID` to your Slave MySQL Servers config files (ex. `mysql.ini`, `my.cnf`)

4) Execute `CHANGE MASTER TO MASTER_HOST= 'YOUR_MASTER_HOST', MASTER_PORT=3306, MASTER_USER='YOUR_MASTER_USER', MASTER_PASSWORD='YOUR_MASTER_PASSWORD';` on your Slave MySQL Servers

5) Execute `START SLAVE;` on your Slave MySQL Servers

6) Execute `show slave status\G;` on your Slave MySQL Servers. Check if connection was successful

7) Test Doctrine configuration: `php bin/console doctrine:query:sql "SELECT 1" --connection=MASTER_OR_SLAVE_CONNECTION`

8) Create entity tables (only on Master): `bin/console doctrine:schema:update --force`

9) Execute file `resources/2_stored_procedures_events.sql` in your Master database

10) Execute file `resources/3_data.sql` in your Master database

11) Make sure the slaves replicated the master correctly


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


