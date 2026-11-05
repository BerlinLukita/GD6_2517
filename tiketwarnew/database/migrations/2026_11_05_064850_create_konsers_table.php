
<?php

use App\Models\Promotor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('konsers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('promotor_id')->constrained('promotors')->restrictOnDelete(); 

            $table->string('nama'); 
            $table->string('kota'); 
            $table->unsignedInteger('harga'); 
            $table->unsignedInteger('sisa'); 
            $table->date('tanggal'); 

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('konsers');
    }
};
