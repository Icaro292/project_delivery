<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('entregas', function (Blueprint $table) {
            // Primeiro aceite: motoqueiro diz que quer pegar a corrida.
            if (!Schema::hasColumn('entregas', 'motoqueiro_aceitou_em')) {
                $table->timestamp('motoqueiro_aceitou_em')->nullable()->after('aceita_em');
            }

            // Segundo aceite: comercio confirma aquele motoqueiro.
            if (!Schema::hasColumn('entregas', 'comercio_aceitou_em')) {
                $table->timestamp('comercio_aceitou_em')->nullable()->after('motoqueiro_aceitou_em');
            }
        });
    }

    public function down(): void
    {
        Schema::table('entregas', function (Blueprint $table) {
            if (Schema::hasColumn('entregas', 'comercio_aceitou_em')) {
                $table->dropColumn('comercio_aceitou_em');
            }

            if (Schema::hasColumn('entregas', 'motoqueiro_aceitou_em')) {
                $table->dropColumn('motoqueiro_aceitou_em');
            }
        });
    }
};
