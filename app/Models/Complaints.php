<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaints extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'response',
        'status',
    ];

    // Relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}