<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'name', 'properties'];

    public function relationships()
    {
        return $this->belongsToMany(Relationship::class);
    }
}
