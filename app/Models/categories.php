<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class categories
 * @package App\Models
 * @version May 4, 2021, 11:16 am UTC
 *
 * @property string $name
 * @property string $order
 */
class categories extends Model
{
    use SoftDeletes;


    public $table = 'categories';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'order'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'order' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
