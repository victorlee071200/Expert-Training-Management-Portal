<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_email','program_code','program_name','start_date', 'end_date', 'state'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
