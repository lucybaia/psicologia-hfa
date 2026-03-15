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
        Schema::table('consultas', function (Blueprint $table) {
            $table->foreignId('profissional_id')
                ->nullable()
                ->constrained('profissionais')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('consultas', function (Blueprint $table) {
            $table->dropForeign(['profissional_id']);
            $table->dropColumn('profissional_id');
        });
    }
};
