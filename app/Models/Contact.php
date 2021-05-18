<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Contact
 * @package App\Models
 * @version May 18, 2021, 2:15 pm UTC
 *
 * @property string $name
 * @property string $email
 * @property integer $phone
 * @property string $message
 */
class Contact extends Model
{
    use SoftDeletes;


    public $table = 'contacts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'phone',
        'message'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
