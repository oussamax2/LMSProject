<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class courses
 * @package App\Models
 * @version May 4, 2021, 10:06 am UTC
 *
 * @property integer $company_id
 * @property string $title
 * @property string $body
 * @property string $published_on
 * @property integer $category_id
 * @property integer $tags
 */
class courses extends Model
{
    use SoftDeletes;


    public $table = 'courses';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'company_id',
        'title',
        'body',
        'published_on',
        'category_id',
        'tags'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'title' => 'string',
        'body' => 'string',
        'published_on' => 'datetime',
        'category_id' => 'integer'
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function categories()
    {
        return $this->belongsTo(categories::class, 'category_id');
    }

  

    public function companies()
    {
        return $this->belongsTo(companies::class, 'company_id');
    }

    public function sessions()
    {
        return $this->HasMany(sessions::class, 'course_id');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function tag()
    {
        return $this->belongsToMany(\App\Models\tags::class, 'course_tag', 'course_id', 'tag_id');
    }
}
