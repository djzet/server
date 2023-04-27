<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class RatingDiscipline extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id_discipline',
        'rating',
        'id_student'
    ];

    public function ratingDisciplines(): BelongsTo
    {
        return $this->belongsTo(Discipline::class, 'id_discipline', 'id');
    }

    protected static function booted()
    {
        static::created(function ($rating) {
            $rating->save();
        });
    }
}