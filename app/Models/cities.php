<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class cities
 * @package App\Models
 * @version May 4, 2021, 9:48 am UTC
 *
 * @property integer $state_id
 * @property string $name
 * @property string $status
 */
class cities extends Model
{
    use SoftDeletes;


    public $table = 'cities';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'state_id',
        'name',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'state_id' => 'integer',
        'name' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
    
    public function states()
    {
        return $this->belongsTo(states::class);
    }
    
    public function sessions()
    {
        return $this->HasMany(sessions::class, 'city');
    }
    
}
