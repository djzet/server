<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'gender',
        'date_birth',
        'group_student',
    ];

    protected static function booted()
    {
        static::created(function ($student) {
            $student->save();
        });
    }

    public function studentGroups(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_student', 'id');
    }
}