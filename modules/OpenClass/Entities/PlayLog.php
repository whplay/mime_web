<?php

namespace Modules\OpenClass\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PlayLog
 * @package App\Models
 * @mixin \Eloquent
 */
class PlayLog extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(\App\Models\ThyroidClassCourse::class, 'thyroid_class_course_id');
    }


    /**
     * @var array
     */
    protected $appends = ['details'];

    /**
     * @return mixed
     */
    public function getDetailsAttribute() {
        $logId =  'student_course_id:' .  $this->attributes['student_course_id'];
        return \Redis::command('HGETALL', [$logId]);
    }
}
