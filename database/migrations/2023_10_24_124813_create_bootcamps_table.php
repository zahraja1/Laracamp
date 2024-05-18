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
        Schema::create('bootcamps', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kategori_id');
            $table->integer('mentor_id');
            $table->string('slug');
            $table->string('harga');
            $table->text('deskripsi');
            $table->string('thumbnail');
            $table->string('kuota')->nullable();
            $table->string('status')->default(1);
            // status
            // 1= tersedia
            // 2= penuh/tidak tersedia
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
        Schema::dropIfExists('bootcamps');
    }
};
