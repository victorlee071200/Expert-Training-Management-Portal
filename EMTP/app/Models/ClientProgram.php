<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_email', 'company_name', 'program_id', 'client_venue', 'no_of_employees', 'payment_type', 'payment_status', 'start_date', 'end_date', 'client_notes', 'status'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
