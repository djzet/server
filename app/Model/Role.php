<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'title',
    ];

    protected static function booted()
    {
        static::created(function ($group) {
            $group->save();
        });
    }
}