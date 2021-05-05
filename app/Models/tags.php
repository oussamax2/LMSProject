<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class tags
 * @package App\Models
 * @version May 4, 2021, 10:01 am UTC
 *
 * @property string $name
 * @property integer $category_id
 */
class tags extends Model
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

    public function courses()
    {
    	return $this->belongsToMany(courses::class);
    }

    public function categories()
    {
    	return $this->belongsTo(categories::class);
    }
}
