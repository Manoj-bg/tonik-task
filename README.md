# tonik-task
Its the task for the tonik org.
# PHP Version >= 8
# Steps
- composer install
- npm install
- make db and put name in .env file
- php artisan migrate
- php artisan db:seed
- npm run dev
- php artisan serve

# If DB not seeded
- php artisan db:seed --class=UsersSeeder
- php artisan db:seed --class=BooksSeeder

# Defaut admin credentials
Email: admin@example.com
Password: Admin@123

# Defaut user credentials
Email: user@example.com
Password: User@123

# If want to add new user can done via registeration page

# Test case written only for Add a book as admin, Borrow a book as user, Return a book as user and Adding a review as user
php artisan test
