<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;
    use Searchable;

    public function searchableAs()
    {
        return 'programs';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        
        return $array;
    }

    protected $fillable = [
        'name', 'type', 'price', 'option', 'status', 'description','code'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
