1) git clone https://github.com/Unoffe/covent.git coventit-test.loc
2) cd coventit-test.loc
3) composer install
4) env.example -> .env
5) DB_DATABASE=...
   DB_USERNAME=...
   DB_PASSWORD=...
6) php artisan migrate:refresh --seed
7) npm install
8) npm run build
9) Visit http://{site_route}/public
10) We have one user after seeding database. His credentials: admin@gmail.com | password. <br>
    However I added register functionality, so you can create additional users for your reasons.
