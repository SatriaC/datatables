Step menjalankan project ini setelah dipindah ke local:
1. composer install
2. cp .env.example .env
3. php artisan key:generate
4. sesuaikan nama db di .env dengan di dbms
5. php artisan migrate
6. Isi data tabel secara manual di dbms 
7. php artisan serve
