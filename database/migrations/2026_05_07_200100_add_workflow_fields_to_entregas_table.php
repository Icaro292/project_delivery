<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // No MySQL troca o enum antigo por varchar, pq agora temos varios status.
        // No sqlite dos testes pula isso, pq sqlite nao entende esse ALTER igual MySQL.
        if (DB::connection()->getDriverName() !== 'sqlite') {
            DB::statement("ALTER TABLE entregas MODIFY status VARCHAR(30) NOT NULL DEFAULT 'disponivel'");
        }

        // Converte dados antigos pro nome novo dos status.
        DB::table('entregas')->where('status', 'destino')->update(['status' => 'disponivel']);
        DB::table('entregas')->where('status', 'entregue')->update(['status' => 'concluida']);

        Schema::table('entregas', function (Blueprint $table) {
            // Comercio que criou a corrida.
            if (!Schema::hasColumn('entregas', 'comercio_id')) {
                $table->foreignId('comercio_id')->nullable()->after('id')->constrained('users')->nullOnDelete();
            }

            // Motoqueiro que aceitou a corrida.
            if (!Schema::hasColumn('entregas', 'motoqueiro_id')) {
                $table->foreignId('motoqueiro_id')->nullable()->after('comercio_id')->constrained('users')->nullOnDelete();
            }

            // Valor que entra no faturamento quando a corrida for concluida.
            if (!Schema::hasColumn('entregas', 'valor')) {
                $table->decimal('valor', 10, 2)->default(0)->after('destino');
            }

            if (!Schema::hasColumn('entregas', 'observacoes')) {
                $table->text('observacoes')->nullable()->after('status');
            }

            // Marca quando começou o aceite.
            if (!Schema::hasColumn('entregas', 'aceita_em')) {
                $table->timestamp('aceita_em')->nullable()->after('observacoes');
            }

            // Usado pra saber quando a corrida virou concluida.
            if (!Schema::hasColumn('entregas', 'concluida_em')) {
                $table->timestamp('concluida_em')->nullable()->after('aceita_em');
            }
        });
    }

    public function down(): void
    {
        Schema::table('entregas', function (Blueprint $table) {
            foreach (['concluida_em', 'aceita_em', 'observacoes', 'valor', 'motoqueiro_id', 'comercio_id'] as $column) {
                if (Schema::hasColumn('entregas', $column)) {
                    $table->dropColumn($column);
                }
            }
        });

        if (DB::connection()->getDriverName() !== 'sqlite') {
            DB::statement("ALTER TABLE entregas MODIFY status ENUM('destino', 'entregue') NOT NULL");
        }
    }
};
