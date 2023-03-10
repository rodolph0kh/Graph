<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'directed', 'source', 'destination', 'properties'];

    public function nodes()
    {
        return $this->belongsToMany(Node::class);
    }
}
