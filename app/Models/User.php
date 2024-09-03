<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'cpf',
        'email',
        'password',
        'role',
        'is_online',
    ];

    public function chatSessions()
    {
        return $this->hasMany(ChatSessions::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function founds()
    {
        return $this->hasMany(Found::class, 'found_by');
    }

    public function takenFounds()
    {
        return $this->hasMany(Found::class, 'taken_by');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
