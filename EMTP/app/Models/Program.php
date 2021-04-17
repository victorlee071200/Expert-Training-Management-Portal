<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'price', 'option', 'status', 'description'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
        ];
}
