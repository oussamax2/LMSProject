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
        'category_id',
        'subcateg_id',
        'status'
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
        'category_id' => 'integer',
        'subcateg_id' => 'integer',
        'status' => 'integer'

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|max:60',
        'body' => 'max:1000',
        'category_id' => 'exists:categories,id',
    ];

    public function categories()
    {
        return $this->belongsTo(categories::class, 'category_id')->withTrashed();
    }

    public function subcategorie()
    {
        return $this->belongsTo(subcategorie::class, 'subcateg_id')->withTrashed();
    }

    public function companies()
    {
        return $this->belongsTo(companies::class, 'company_id')->withTrashed();
    }

    public function sessions()
    {
        return $this->HasMany(sessions::class, 'course_id')->withTrashed();
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function tag()
    {
        return $this->belongsToMany(\App\Models\tags::class, 'course_tag', 'course_id', 'tag_id');
    }


    /** verif is my */
    public function my()
    {
        if(auth()->user()->hasRole('admin'))
        return true;
        if(auth()->user()->hasRole('company'))
        return ($this->company_id == auth()->user()->companies->id);
    }

        /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function target_audiance()
    {
        return $this->belongsToMany(\App\Models\target_audiance::class, 'target_courses', 'course_id', 'target_id');
    }

    // this is the recommended way for declaring event handlers
    public static function boot() {
        parent::boot();
        self::deleting(function($course) { // before delete() method call this
             $course->sessions()->each(function($session) {
                $session->delete(); // <-- delete sessions belonging to this course
             });

        });
    }
}
