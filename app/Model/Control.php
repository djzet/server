<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Control extends Model
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