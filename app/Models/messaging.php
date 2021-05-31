<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class messaging
 * @package App\Models
 * @version May 31, 2021, 4:46 pm UTC
 *
 * @property \App\Models\User $user
 * @property \App\Models\registerations $registeration
 * @property integer $user_id
 * @property integer $registeration_id
 * @property string $message
 */
class messaging extends Model
{
    use SoftDeletes;


    public $table = 'messagings';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'registeration_id',
        'message'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'registeration_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function registeration()
    {
        return $this->belongsTo(\App\Models\registerations::class, 'registeration_id');
    }
}
