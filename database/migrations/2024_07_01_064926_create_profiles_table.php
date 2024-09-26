<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('profiles', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained();
        $table->string('foto', 255)->nullable();
        $table->string('nama_lengkap', 30);
        $table->bigInteger('nik')->unique()->nullable();
        $table->integer('umur')->nullable();
        $table->string('no_telepon', 13)->nullable();
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
        $table->string('tempat_lahir', 20)->nullable();
        $table->date('tanggal_lahir')->nullable();
        $table->string('pekerjaan', 20)->nullable();
        $table->string('alamat', 100)->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
