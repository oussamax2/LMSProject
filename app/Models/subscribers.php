<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class subscribers
 * @package App\Models
 * @version July 8, 2021, 3:38 pm UTC
 *
 * @property string $email
 */
class subscribers extends Model
{
    use SoftDeletes;


    public $table = 'subscribers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email' => 'required|string|email|max:255',
    ];

    
}
