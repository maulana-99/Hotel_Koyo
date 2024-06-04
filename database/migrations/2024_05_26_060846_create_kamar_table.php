<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kamar', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kamar');
            $table->enum('tipe_kamar', ['regular', 'delux'])->default('regular');
            $table->text('deskripsi');
            $table->enum('jenis_kasur', ['twin', 'king'])->default('king');
            $table->enum('kapasitas', ['1', '2',])->default('1');
            $table->decimal('harga', 8, 2);
            $table->integer('quantity');
            $table->string('foto_kamar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
