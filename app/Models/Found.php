<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Found extends Model
{
    use HasFactory;


    protected $fillable = [
        'name', 'description', 'location', 'found_at', 'found_by', 'already_taken', 'taken_by'
    ];

    public function foundBy()
    {
        return $this->belongsTo(User::class, 'found_by');
    }

    public function takenBy()
    {
        return $this->belongsTo(User::class, 'taken_by');
    }

    public function messages()
    {
        return $this->hasMany(Message::class); // <- ideia do chatgpt blz
    }
}
