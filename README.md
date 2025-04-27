# UTS PSS

Projek ini dibuat dengan Laravel

Alur pengerjaan projek
1. Buat project Laravel baru dengan perintah berikut:
    ```bash
    laravel new backend-inventory-management
    cd backend-inventory-management
    composer run dev
    ```

    Setelah itu, kunjungi `http://backend-inventory-management.test` di browser untuk memastikan proyek berhasil dibuat.

    Notes: jika tidak menggunakan laravel herd, maka linknya adalah pada saat running `composer run dev`

2. Membuat model untuk entitas yang diperlukan. misal di projek ini ada Category, Item, Supplier.

    ```bash
    php artisan make:model -ms Category
    php artisan make:model -ms MODEL
    ```

    ket: -ms berarti membuat file migrasi (migration) dan file seeder (seeder) untuk model yang akan dibuat

    setelah itu diisikan skema migrasi dan seedernya, lalu `php artisan migrate:fresh --seed`

3. Setelah itu, setup api (laravel sanctum) dan sail (laravel sail) menggunakan artisan command 

    ```bash
    php artisan install:api
    php artisan sail:install
    ```

    akan muncul file baru yaitu
    * `routes/api.php`
    * `docker-compose.yml`

    isikan routing-an api di `routes/api.php` dan untuk `docker-compose.yml` akan ter-generate otomatis.

4. Membuat resource api controller
    ```bash
    php artisan make:controller
    ```

    untuk validasi request
    ```bash 
    php artisan make:request MethodModelRequest # ganti method dan model yang sesuai
    ```

    lalu panggil controller di `routes/api.php`
    ```php
    use App\Http\Controllers\ItemController;

    ...
    Route::resource('items', ItemController::class);
    ...
    ```

6. Install Laravel Sail (jika belum terinstall)
    ```bash
    composer require laravel/sail --dev
    php artisan sail:install
    ```
    akan menjalankan docker compose.
    buka ```http://localhost:9000``` untuk melihat hasilnya. 
    Catatan: URL ini mungkin berbeda tergantung pada konfigurasi `.env` anda.
    ```bash
    ./vendor/bin/sail up
    ```

    akan menjalankan docker compose.
    buka ```http://localhost:9000``` untuk melihat hasilnya.