<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('cascade');
            $table->date('data');
            $table->time('hora');
            $table->integer('duracao')->default(50); // em minutos
            $table->enum('status', ['agendada', 'realizada', 'cancelada'])->default('agendada');
            $table->text('anotacoes')->nullable();
            $table->timestamps();
        });
    }
};
