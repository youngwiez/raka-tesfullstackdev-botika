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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->enum('divisi', [
                'HRD',
                'Marketing',
                'Production',
            ]);
            $table->enum('pekerjaan', [
                'Fullstack Dev',
                'PHP Dev',
                'UI/UX',
                'QA',
                'DevOps',
                'IT Analyst',
                'IT Staff',
            ])->default('Fullstack Dev');
            $table->enum('status', [
                'Aktif',
                'Tidak Aktif',
            ])->default('Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
