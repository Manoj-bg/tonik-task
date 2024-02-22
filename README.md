# tonik-task
Its the task for the tonik org.
# PHP Version >= 8
# steps
- composer install
- npm install
- make db and put name in .env file
- php artisan migrate
- php artisan db:seed
- npm run dev
- php artisan serve

# If DB Not seeded
- php artisan db:seed --class=UsersSeeder
- php artisan db:seed --class=BooksSeeder

# Defaut Admin Credentials
Email: admin@example.com
Password: Admin@123

# Unit test case written only for save a book
php artisan make:factory BookFactory --model=Book
php artisan test

