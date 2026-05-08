<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entregador extends Model
{
    // Tabela antiga de entregadores. O login novo usa users, mas deixei isso funcionando.
    protected $table = "entregadores";
    protected $primaryKey = "id";
    protected $fillable = ["nome", "cpf", "entrega_id"];
    protected $hidden = ["created_at", "updated_at"];

    public function entrega()
    {
        // Cada entregador desta tabela fica ligado a uma entrega.
        return $this->belongsTo(Entrega::class);
    }
}
