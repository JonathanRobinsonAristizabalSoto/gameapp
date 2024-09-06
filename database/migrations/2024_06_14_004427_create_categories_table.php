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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('name')->unique(); // Nombre de la categoría, único
            $table->string('image')->nullable(); // Imagen de la categoría, con valor predeterminado
            $table->string('manufacturer'); // Fabricante
            $table->date('releasedate'); // Fecha de lanzamiento
            $table->text('description'); // Descripción
            $table->timestamps(); // Timestamps para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories'); // Elimina la tabla si existe
    }
};
