<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class registerations
 * @package App\Models
 * @version May 4, 2021, 9:53 am UTC
 *
 * @property integer $session_id
 * @property integer $user_id
 * @property string $status
 */
class registerations extends Model
{
    use SoftDeletes;


    public $table = 'registerations';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'session_id',
        'user_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'session_id' => 'integer',
        'user_id' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function sessions()
    {
        return $this->BelongsTo(sessions::class, 'session_id');
    }

    public function user()
    {
        return $this->BelongsTo(User::class, 'user_id');

    }

    public function companies()
    {
        return $this->BelongsTo(companies::class);

    }

    public function touser()
    {
        return $this->where('user_id',auth()->user()->id);
    }

}
