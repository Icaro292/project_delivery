<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class entregador extends Model
{
    protected $table = "entregadores";
    protected $primaryKey = "id";
    protected $fillable = ["nome", "cpf", "contato"];
    protected $hidden = ["created_at","updated_at"];
}
