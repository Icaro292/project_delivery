<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    // Campos que podem ser gravados em massa no cadastro.
    protected $fillable = [
        'name',
        'email',
        'password',
        'nivel_acesso',
    ];

    // Nunca mostrar senha/token quando o usuario virar JSON.
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            // Laravel faz hash automatico quando salvar password.
            'password' => 'hashed',
        ];
    }

    public function entregasCriadas()
    {
        // Corridas que este usuario criou como comercio.
        return $this->hasMany(Entrega::class, 'comercio_id');
    }

    public function entregasAceitas()
    {
        // Corridas que este usuario pegou como motoqueiro.
        return $this->hasMany(Entrega::class, 'motoqueiro_id');
    }

    public function isAdmin(): bool
    {
        return $this->nivel_acesso === 'admin';
    }

    public function isComercio(): bool
    {
        return $this->nivel_acesso === 'comercio';
    }

    public function isMotoqueiro(): bool
    {
        return $this->nivel_acesso === 'motoqueiro';
    }
}
