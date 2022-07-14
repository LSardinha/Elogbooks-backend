
## Installation

- Create database sqlite file by using **touch database/database.sqlite** from the root of the project.
- Create a .env (by copying .env.example from the project root folder) and make sure the following looks the same:
**DB_CONNECTION**=sqlite
**DB_DATABASE**={full_path_to}/database/database.sqlite
(do a **pwd** insise the database folder from the project to get the full path)
- Remove all the other **DB_{xx}** variables or comment then out.
- Run **php artisan migrate**
- Run **php artisan serve --port=400** to launch the server

Troubleshooting:
I got issues to make sqlite3 work on my local environment. The following commands helped with the situation.
**sudo add-apt-repository ppa:ondrej/php**
**sudo apt-get update**
**sudo apt-get install -y php7.4**
**sudo apt-get install php7.4-sqlite3**
**sudo apt-get install php-sqlite3**

Happy to have a quick call and show everything is working if required.
