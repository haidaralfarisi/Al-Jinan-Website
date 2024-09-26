<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlokMakamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blok_makams', function (Blueprint $table) {
            $table->id();
            $table->string('nama_blok', 10);
            $table->foreignId('tpu_id')->constrained();
            $table->string('foto', 255);
            $table->string('kapasitas', 5);
            $table->string('harga_sewa', 15);
            $table->longText('deskripsi');
            $table->string('luas_blok', 10);
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
        Schema::dropIfExists('blok_makams');
    }
}
