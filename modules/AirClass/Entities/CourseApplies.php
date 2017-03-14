<?php

namespace Modules\AirClass\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\AirClass\Scopes\SiteScope;

/**
 * Class Banner
 * @package App\Models
 * @mixin \Eloquent
 */
class CourseApplies extends Model
{
    /**
     * @var string
     */
    protected $table = 'course_applies';
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SiteScope);
    }

}