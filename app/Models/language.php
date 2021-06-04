<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class language
 * @package App\Models
 * @version June 3, 2021, 10:03 am UTC
 *
 * @property string $name
 */
class language extends Model
{
    use SoftDeletes;


    public $table = 'languages';
    

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
        'name' => 'required|max:30',
    ];

    public function sessions()
    {
        return $this->HasMany(sessions::class);
    }
}
