<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class courses
 * @package App\Models
 * @version May 3, 2021, 11:13 am UTC
 *
 * @property string $name
 * @property string $subject
 * @property integer $duration
 * @property integer $price
 */
class courses extends Model
{
    use SoftDeletes;


    public $table = 'courses';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'subject',
        'duration',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'subject' => 'string',
        'duration' => 'integer',
        'price' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
