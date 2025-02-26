<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('animales', function (Blueprint $table) {
            $table->id('id_animal');
            $table->string('nombre');
            $table->enum('tipo', ['perro', 'gato', 'hámster', 'conejo']);
            $table->decimal('peso', 8, 2);
            $table->string('enfermedad');
            $table->text('comentarios')->nullable();
            $table->foreignId('dueno_id')
                  ->constrained('duenos', 'id_persona')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }
};
