<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ThyroidClassCourse
 * @package App\Models
 * @mixin \Eloquent
 */
class ThyroidClassCourse extends Model
{

    /**
     * @var string
     */
    protected $table = 'thyroid_class_courses';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function thyroidClassPhase()
    {
        return $this->belongsTo(ThyroidClassPhase::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function playLogs()
    {
        return $this->hasMany(PlayLog::class);
    }
}
