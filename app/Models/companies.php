<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * Class companies
 * @package App\Models
 * @version May 4, 2021, 9:54 am UTC
 *
 * @property string $name
 */
class companies extends Model
{
    use SoftDeletes;


    public $table = 'companies';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


    public function courses()
    {
        return $this->HasMany(courses::class);
    }

    public function sessions()
    {
        return $this->HasMany(sessions::class);
    }
}
