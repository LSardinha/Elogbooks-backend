
## Installation

- Create database sqlite file by using **touch database/database.sqlite** from the root of the project.
- Create a .env (by copying .env.example from the project root folder) and make sure the following looks the same:
**DB_CONNECTION**=sqlite
**DB_DATABASE**={full_path_to}/database/database.sqlite
(do a **pwd** insise the database folder from the project to get the full path)
- Remove all the other **DB_{xx}** variables or comment then out.
- Run **php artisan migrate**
- Run **php artisan serve --port=400** to launch the server