<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class course_tag
 * @package App\Models
 * @version May 4, 2021, 10:07 am UTC
 *
 * @property integer $course_id
 * @property integer $tag_id
 */
class course_tag extends Model
{
    use SoftDeletes;


    public $table = 'course_tag';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'course_id',
        'tag_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'course_id' => 'integer',
        'tag_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
