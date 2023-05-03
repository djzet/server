<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Discipline extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'semester',
        'hours',
        'control',
    ];

    protected static function booted()
    {
        static::created(function ($discipline) {
            $discipline->save();
        });
    }

    public function controlDisciplines(): BelongsTo
    {
        return $this->belongsTo(Control::class, 'control', 'id');
    }
}