<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kontaks', function (Blueprint $table) {
            $table->id();                    // id auto
            $table->string('nama');          // varchar(255)
            $table->text('alamat');          // text
            $table->string('no_hp', 13);     // panjang 13 digit
            $table->timestamps();            // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kontaks');
    }
};
