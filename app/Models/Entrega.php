<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $table = "entregas";
    protected $primaryKey = "id";
    protected $fillable = ["entregador_id", "origem","destino", "status"];
    protected $hidden = ["created_at", "updated_at"];
}
