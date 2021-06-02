<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class User
 * @package App\Models
 * @version June 2, 2021, 11:21 am UTC
 *
 * @property string $name
 * @property string $email
 */
class User extends Model
{


    public $table = 'users';
    



    public $fillable = [
        'name',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
