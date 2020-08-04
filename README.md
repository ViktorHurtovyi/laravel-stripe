Please follow this instruction to run the project:

1. rename .env.example to .env
2. add your db connects to .env and change STRIPE_KEY, STRIPE_SECRET and ADMIN_MAIL
3. run composer install
4. run php artisan migrate --seed
5. run php artisan serve
