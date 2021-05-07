<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class tag
 * @package App\Models
 * @version May 6, 2021, 1:19 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $courses
 * @property \App\Models\categories $category
 * @property string $name
 * @property integer $category_id
 */
class tag extends Model
{
    use SoftDeletes;


    public $table = 'tags';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'category_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'category_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function courses()
    {
        return $this->belongsToMany(\App\Models\courses::class, 'course_tag', 'tag_id', 'course_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function categories()
    {
        return $this->belongsTo(\App\Models\categories::class, 'category_id');
    }
}
