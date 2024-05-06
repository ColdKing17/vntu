# How to start the project

1. Clone a repository into a new directory:
   ```
   git clone --branch develop-backlog https://github.com/ColdKing17/vntu.git
   ```
2. Go to the working directory: `cd vntu`
3. Prepare .env: `cp .env.example .env`
4. Run docker: `docker-compose up -d`
5. Access application container by using `docker exec -it vntu-app /bin/bash`
6. In a running container execute next commands:
    ```
    composer install
    php artisan key:generate
    php artisan storage:link
    php artisan migrate:fresh --seed
    npm install
    npm run build
    ```
7. You can generate mock data using `php artisan db:seed --class=MockDatabaseSeeder`
8. To work properly, it is necessary to process queues and schedule commands
9. The site available on `localhost`
