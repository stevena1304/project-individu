<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_contact_siswa', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('siswa_id')->unsigned();
            $table->foreign('siswa_id')->references('id')->on('siswa')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->BigInteger('jenis_contact_id')->unsigned();
            $table->foreign('jenis_contact_id')->references('id')->on('jenis_contact')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->char('deskripsi');
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
        Schema::dropIfExists('jenis_contact_siswa');
    }
}
