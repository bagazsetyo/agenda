<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agenda extends Model
{
    use SoftDeletes;

    protected $table = 'tb_agenda';

    protected $fillable = [
        'judul'
    ];

    public function detail()
    {
        return $this->hasMany(DetailAgenda::class, 'agenda_id');
    }
}
