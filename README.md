<h1 align="center">Dr. Bubo Patika</h1>
<h4 align="center">Az alábbi LARAVEL project gyakorlási célból készült</h4>

<p align="left">A megoldás során PostgreSQL-t és TailwindCSS-t használtam. A lokális futtatáshoz minden beállítás megtalálható a .env.example fileban. </p>

- git clone https://github.com/martin-german/LaravelPraticeApp
- cd LaravelPraticeApp
- composer install
- npm install
- npm run build
- .env beállítása (APP_KEY!!! - DB)
- APP_KEY generálása: php artisan key:generate
- php artisan migrate
- php artisan db:seed
- Frontend futtatás: npm run dev
- Backend futtatás: php artisan serve --port=16000

<p align="center">Sikeres futást követően az alábbi címen <b>http://127.0.0.1:16000</b> érhető el a project</p>
