<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class GroupDiscipline extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id_group',
        'id_discipline'
    ];

    public function groupDisciplines(): BelongsTo
    {
        return $this->belongsTo(Discipline::class, 'id_discipline', 'id');
    }

    protected static function booted()
    {
        static::created(function ($group) {
            $group->save();
        });
    }
}