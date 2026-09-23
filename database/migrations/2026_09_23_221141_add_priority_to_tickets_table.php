<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Força a inserção da coluna diretamente na tabela física ativa
        if (!Schema::hasColumn('tickets', 'priority')) {
            Schema::table('tickets', function (Blueprint $table) {
                $table->string('priority')->default('Baixa');
            });
        }
    }

    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('priority');
        });
    }
};
