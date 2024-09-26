<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTpusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tpu', 30);
            $table->longText('alamat');
            $table->foreignId('user_id')->constrained();
            $table->string('luas_wilayah', 10);
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
        Schema::dropIfExists('tpus');
    }
}
