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
        Schema::create('practicantes', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_practicante',40);
            $table->string('apellido_practicante',80);
            $table->string('apellido_materno_practicante',80);
            $table->string('curp_practicante',20);
            $table->text('direccion_practicante');
            $table->string('telefono_practicante',12);
            $table->enum('genero_practicante', ['Masculino','Femenino']);
            $table->date('fecha_nacimiento_practicante');
            $table->string('codigo_gafete',5)->unique(); 
            $table->date('fecha_ingreso_practicante');
            $table->enum('status_practicante', ['Activo', 'Inactivo', 'Finalizado']);
            $table->text('fotografia_practicante',250);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('area_id')->constrained('areas')->onDelete('cascade');
           

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practicantes');
    }
};
