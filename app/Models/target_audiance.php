<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class target_audiance
 * @package App\Models
 * @version May 28, 2021, 9:13 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $courses
 * @property string $name
 */
class target_audiance extends Model
{
    use SoftDeletes;


    public $table = 'target_audiances';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:30',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function courses()
    {
        return $this->belongsToMany(\App\Models\courses::class, 'target_courses', 'target_id', 'course_id');
    }
}
