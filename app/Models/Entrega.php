<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    // Nome real da tabela no banco.
    protected $table = "entregas";
    protected $primaryKey = "id";

    // Campos que podem ser preenchidos pelo create/update.
    protected $fillable = [
        "comercio_id",
        "motoqueiro_id",
        "origem",
        "destino",
        "valor",
        "status",
        "observacoes",
        "aceita_em",
        "motoqueiro_aceitou_em",
        "comercio_aceitou_em",
        "concluida_em",
    ];

    // Esconde datas padrao quando devolver JSON, pra resposta ficar mais limpa.
    protected $hidden = ["created_at", "updated_at"];

    // Converte valores do banco para tipos melhores no PHP.
    protected $casts = [
        'valor' => 'decimal:2',
        'aceita_em' => 'datetime',
        'motoqueiro_aceitou_em' => 'datetime',
        'comercio_aceitou_em' => 'datetime',
        'concluida_em' => 'datetime',
    ];

    public function entregadores()
    {
        // Relacao antiga com a tabela entregadores.
        return $this->hasMany(Entregador::class);
    }

    public function comercio()
    {
        // Usuario que criou a corrida.
        return $this->belongsTo(User::class, 'comercio_id');
    }

    public function motoqueiro()
    {
        // Usuario motoqueiro que aceitou a corrida.
        return $this->belongsTo(User::class, 'motoqueiro_id');
    }
}
