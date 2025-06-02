<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'schema',
    ];

    protected $casts = [
        'schema' => 'array', // auto-cast JSON to PHP array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

