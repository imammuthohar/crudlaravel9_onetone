<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('nama');
            $table->string('nis');
            $table->string('tempatlahir');
            $table->date('tanggallahir');
            $table->string('alamat');
            $table->string('jeniskelamin');
            $table->string('agama');
            $table->string('email');
            $table->string('hobi');
            $table->string('warna');
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
        Schema::dropIfExists('siswas');
    }
};
