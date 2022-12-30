<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInnovationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('innovation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('judul');
            $table->string('thumbnail');
            $table->text('deskripsi');
            $table->text('sebelum_inovasi');
            $table->text('setelah_inovasi');
            $table->text('output');
            $table->text('outcome');
            $table->text('dampak_kinerja');
            $table->string('tautan_aplikasi')->nullable();
            $table->string('tautan_video')->nullable();
            $table->string('folder_id_dokumentasi')->nullable();
            $table->json('dokumentasi');
            $table->timestamp('tanggal_implementasi');
            $table->string('nama_inovator');
            $table->string('nomor_hp_inovator');
            $table->json('nama_koinovator');
            $table->text('lomba');
            $table->text('replikasi');
            $table->text('tujuan');
            $table->text('signifikansi');
            $table->text('inovatif');
            $table->text('transferabilitas');
            $table->text('sumber_daya');
            $table->text('dampak');
            $table->text('stakeholder');
            $table->text('pelajaran');
            $table->text('platform');
            $table->string('sop')->nullable();
            $table->string('tautan_git')->nullable();
            $table->enum('top_order', [1, 2, 3, 4, 5])->nullable();
            $table->timestamp('published_at');
            $table->timestamps();

            $table->index(['judul', 'top_order', 'published_at', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('innovation');
    }
}
