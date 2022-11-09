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
        Schema::create('nisns', function (Blueprint $table) {
            $table->bigInteger('id_siswa')
            ->unsigned()
            ->primary('id_siswa');
            $table->string('nisn')->unique();
            $table->timestamps();
            $table->foreign('id_siswa')
            ->references('id')->on('siswas') // id yang didapat dari table siswa.
              ->onDelete('cascade')
              ->onUpdate('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nisns');
    }
};

// public function up()
// {
//     Schema::create('phones', function (Blueprint $table) {
//         $table->id();
//         $table->unsignedBigInteger('user_id');
//         $table->string('phone');
//         $table->timestamps();

//         $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//     });
// }
