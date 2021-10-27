<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDetailAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_detail_agenda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agenda_id')->constrained()->on('tb_agenda')->onDelete('cascade');
            $table->string('judul');
            $table->string('start');
            $table->string('end');
            $table->longText('detail');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_detail_agenda');
    }
}
