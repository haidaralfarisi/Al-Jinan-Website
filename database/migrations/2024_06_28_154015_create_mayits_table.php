<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMayitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mayits', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 40);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('golongan', ['dewasa', 'anak-anak']);
            $table->string('tempat_lahir', 15);
            $table->string('tanggal_lahir', 15);
            $table->string('tanggal_meninggal', 15)->nullable();
            $table->string('alamat', 40);
            $table->string('bapak_kandung', 40);
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
        Schema::dropIfExists('mayits');
    }
}
