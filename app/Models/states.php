<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class states
 * @package App\Models
 * @version May 4, 2021, 9:39 am UTC
 *
 * @property integer $country_id
 * @property string $name
 * @property string $status
 */
class states extends Model
{
    use SoftDeletes;


    public $table = 'states';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'country_id',
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
        'country_id' => 'integer',
        'name' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:10',
    ];

    public function cities()
    {
        return $this->hasMany(cities::class);
    }
    
    public function countries()
    {
        return $this->belongsTo(countries::class, 'country_id');
    }

    public function sessions()
    {
        return $this->HasMany(sessions::class);
    }
}
