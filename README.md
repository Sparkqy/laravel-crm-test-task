# laravel-crm-test-task

To run this project follow next steps: 
1. Create new folder for project files (e.g laravel-crm)
2. cd laravel-crm
3. git clone https://github.com/Sparkqy/laravel-crm-test-task.git . 
4. docker-compose up -d
5. docker-compose exec app bash -> composer install -> cp .env.example .env -> php artisan key:generate
6. Create database (if it does not exist) with the name of DB_DATABASE variable in .env file
7. php artisan migrate --seed
8. Open link http://localhost:8000 and follow authorization (all passwords are string 'password') or register new account   
