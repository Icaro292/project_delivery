<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Nivel de acesso define o que cada usuario pode fazer no sistema.
            // Ex: comercio cria corrida, motoqueiro aceita, admin ve tudo.
            if (!Schema::hasColumn('users', 'nivel_acesso')) {
                $table->string('nivel_acesso', 20)->default('motoqueiro')->after('password');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Volta atras removendo o campo se precisar rollback.
            if (Schema::hasColumn('users', 'nivel_acesso')) {
                $table->dropColumn('nivel_acesso');
            }
        });
    }
};
