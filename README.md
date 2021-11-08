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
- Isi dalam migration
    ```
    ...
            $table->string('level_school');
            $table->string('score');
            $table->longText('note');
            $table->softDeletes();
    ...
    ```
    *tambahkan column seperti contoh di antara 
    ```
    $table->id();
    <isi>
    $tbale->timestamps();
    ```
- menjalankan file migrasi 
    ```
    php artisan migrate
    ```

**controller**
- Membuat Controller
    ```
    php artisan make:controller <nama controller> -r
    ```
    *untuk nama controller harus di awali huruf kapital dan di akhiri tulisan controller
    *ex
    ```
    php artisan make:controller Admin\SchoolLevelReadingController -r
    ```
    *menambahkan *Admin\* bertujuan untuk menginisialisasikan berarti dia akan di buat di folder *Admin*
- mengarahkan ke file view
    example pada function index
    ```
    return view('pages.admin.schoollevelreading.index');
    ```
    *note berarti file berada di dalam folder pages/admin/schoollevelreading/index.blade.php
- memanggil model dalam controller
    - langkah 1
    ```
    use App\Models\SchoolLevelReading;
    ```
    gunakan di bawah namespace
    - langkah 2
    ```
    $items = SchoolLevelReading::all();
    ```
    macam macam fungsi di model
        1. SchoolLevelReading::all() => memanggil semua data
        2. SchoolLevelReading::get() => memanggil semua data
        3. SchoolLevelReading::first() => memanggil data pertama
        4. SchoolLevelReading::where('id',1)->get() => memanggil data dengan kondisi
        5. SchoolLevelReading::where('id',1)->first() => memanggil 1 data dengan kondisi id =1
        6. SchoolLevelReading::findOrFail(1) => memanggil data dengan id = 1 
        7. SchoolLevelReading::findOrFail(1)->delete() => menghapus data dengan id = 1
- menampilkan data di view
    ```
        $items = SchoolLevelReading::all();
        return view('pages.admin.schoollevelreading.index')->with([
            'items' => $items
        ]);
    ```
**view**
- membuat file view
    wajib di akhiri dengan .blade.php
    ```
    index.blade.php
    ```
- menampilakn layout yang sudah saya sediakan
    ```
    @extends('layouts.layouts')

    @section('title', 'School Level Reading')

    @section('content')
        
        <isi content apapun disini>
        
    @endsection
    ```
    *isi konenten di dalam @section('content') -- @endsection
- looping data dari databases
    ```
        @foreach ($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->level_school }}</td>
            <td>{{ $item->score }}</td>
            <td>{{ $item->note }}</td>
            <td>
                <form action="{{ route('admin.schoollevelreading.destroy',$item->id) }}">
                @csrf
                @method('delete')
                <a href="{{ route('admin.schoollevelreading.edit',$item->id) }}" class="btn btn-warning">edit</a>
                <button class="btn btn-danger">hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    ```
    * note
    @method ada beberapa bagian 
    1. @method('delete') => khusus untuk hapus data
    2. @method('put') => khusus untuk update data
    @csrf => token untuk (create, update, delete)
