<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tambahkan kolom warna ke tabel points
        Schema::table('points', function (Blueprint $table) {
            $table->string('color', 20)->default('#3388FF')->after('description'); // Default warna biru Leaflet
        });

        // Tambahkan kolom warna ke tabel polylines
        Schema::table('polylines', function (Blueprint $table) {
            $table->string('color', 20)->default('#3388FF')->after('description');
        });

        // Tambahkan kolom warna ke tabel polygons
        Schema::table('polygons', function (Blueprint $table) {
            $table->string('color', 20)->default('#3388FF')->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
