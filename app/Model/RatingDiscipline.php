<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class RatingDiscipline extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id_discipline',
        'rating',
        'id_student'
    ];

    protected static function booted()
    {
        static::created(function ($rating_discipline) {
            $rating_discipline->save();
        });
    }

    public function ratingDisciplines(): BelongsTo
    {
        return $this->belongsTo(Discipline::class, 'id_discipline', 'id');
    }
}