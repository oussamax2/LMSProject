<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class countries
 * @package App\Models
 * @version May 4, 2021, 9:19 am UTC
 *
 * @property string $name
 * @property string $status
 */
class countries extends Model
{
    use SoftDeletes;


    public $table = 'countries';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
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
        return $this->hasMany(states::class, 'country_id');
    }
    public function sessions()
    {
        return $this->HasMany(sessions::class);
    }
}
