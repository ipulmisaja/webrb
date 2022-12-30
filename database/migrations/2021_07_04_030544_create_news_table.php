<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('judul_berita');
            $table->string('thumbnail');
            $table->text('deskripsi');
            $table->string('folder_id_gambar')->nullable();
            $table->json('gambar')->nullable();
            $table->json('video')->nullable();
            $table->text('output')->nullable();
            $table->text('outcome')->nullable();
            $table->enum('top_order', [1, 2, 3, 4, 5])->nullable();
            $table->enum('area', [1, 2, 3, 4, 5, 6]);
            $table->boolean('tampil');
            $table->timestamp('published_at');
            $table->timestamps();

            $table->index(['judul_berita', 'top_order', 'published_at', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
