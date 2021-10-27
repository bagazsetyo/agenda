<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailAgenda extends Model
{
    use SoftDeletes;

    protected $table = 'tb_detail_agenda';

    protected $fillable = [
        'agenda_id',
        'judul',
        'start',
        'end',
        'detail'
    ];
}
