### Test library app
___

#### Project setup:
1. ``git clone https://github.com/bakhtiyor-dev/library.git``

2. ``cd library``

3. ``composer install`` && ``php artisan key:generate``

4. copy .env.example to .env and setup your environment configurations

5. ``php artisan migrate``

6. ``php artisan db:seed``

7. ``npm install && vite``

8. ``php artisan serve``

9. setup queue and mail

10. ``php artisan queue:work``

11. ``php artisan storage:link``

Admin panel : 'http://{domain}/admin'

Admin credentials: 
admin@domain.com 
password
