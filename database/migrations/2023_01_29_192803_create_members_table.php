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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('npm');
            $table->string('emailStudents', 30);
            $table->string('noHp', 15);
            $table->string('line');
            $table->string('angkatan', 4);
            $table->unsignedBigInteger('id_prodi');
            $table->foreign('id_prodi')->references('id')->on('prodis');
            $table->unsignedBigInteger('id_ta');
            $table->foreign('id_ta')->references('id')->on('tahun_akademiks');
            $table->unsignedBigInteger('id_div');
            $table->foreign('id_div')->references('id')->on('divisis');
            $table->char('status', 5);
            $table->integer('creator');
            $table->integer('modifier')->nullable();
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
        Schema::dropIfExists('members');
    }
};
