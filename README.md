#   Requirement
 - PHP 7.4 / Laragon versi terbaru
 - composer versi 2

#   Tutorial Singkat
**Structure Folder**
- App\Model => Penghubung antara Laravel dan Databases
- App\Http\Controllers => Logic
- Databses\Migration => membuat table dalam databases
- Resource\View
  - includes => Component seperti Navbar, sidebar, footer, script, style, dll
  - layouts => tempat menyatukan file antara includes dan pages
  - page => file file yang akan di tampilan di layar
- route => url website

**Model**
- create model 
    ```
    php artisan make:model <nama model>
    ```
    *ex
    ```
    php artisan make:model SchoolLevelReading
    ```
    *note awalan harus kapital
- Isi dalam model
    ```
    protected $table = 'tb_school_level_reading';

    protected $fillable = [
        'level_school',
        'score',
        'note'
    ];
    ```
    *isi model wajib ada dua itu, untuk nama table ($table), nama filde yang nanti di buat di databases ($fillable)
 
**Migration**
- Create Databases
    ```
    php artisan make:migration <nama untuk file> --create=<nama tabel>
    ```
    *example 
    ```
    php artisan make:migration create_tb_school_level_reading_table --create=tb_school_level_reading
    ```
