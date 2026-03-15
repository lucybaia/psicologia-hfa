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
        Schema::create('profissionais', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('registro')->unique(); // mudado de crp para registro (pode ser CRP ou CRM)
            $table->string('especialidade');
            $table->string('email')->unique();
            $table->string('telefone');
            $table->enum('tipo', ['psicologo', 'psiquiatra'])->default('psicologo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profissionais');
    }
};
