<?php

namespace Model;

use Controller\Disciplines;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'number',
        'course',
    ];

    protected static function booted()
    {
        static::created(function ($group) {
            $group->save();
        });
    }
}