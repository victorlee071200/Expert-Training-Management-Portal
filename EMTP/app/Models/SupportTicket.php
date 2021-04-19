<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'title', 'description', 'priority', 'assign_to','status',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
        ];
}
