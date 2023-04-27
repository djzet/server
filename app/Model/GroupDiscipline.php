<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class GroupDiscipline extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id_group',
        'id_discipline'
    ];

    protected static function booted()
    {
        static::created(function ($group) {
            $group->save();
        });
    }
}