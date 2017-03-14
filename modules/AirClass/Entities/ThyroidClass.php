<?php

namespace Modules\AirClass\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\AirClass\Scopes\SiteScope;
/**
 * Class ThyroidClass
 * @package App\Models
 * @mixin \Eloquent
 */
class ThyroidClass extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'thyroid_classes';

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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'comment',
        'logo_url',
        'banner_autopaly',
        'latest_update_at',
        'latest_update_at',
        'qcloud_app_id',
        'qcloud_file_id',
        'site_id',
    ];
}