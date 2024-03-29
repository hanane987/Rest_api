<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'company', 'title', 'email',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $table = 'business_cards';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
