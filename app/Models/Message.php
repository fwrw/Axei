<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_session_id', 'user_id', 'message_text', 'found', 'sent_at',
    ];

    public function chatSession()
    {
        return $this->belongsTo(ChatSession::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento opcional com o modelo Found
    public function found()
    {
        return $this->belongsTo(Found::class, 'found_id');
    }
}
