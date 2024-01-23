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
        Schema::table('cursos', function (Blueprint $table) {
            $table->after('categoria_id', function ($table) {
            // Agrega el campo 'profesor_id' después de 'categoria_id'
            $table->unsignedBigInteger('profesor_id')->nullable(); // Puedes cambiar el tipo de dato según tus necesidades
            $table->foreign('profesor_id')->references('id')->on('users')->onDelete('cascade'); // Agrega una clave foránea si es necesario
            });
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropForeign(['profesor_id']);
            $table->dropColumn('profesor_id');
        });
    }
};
