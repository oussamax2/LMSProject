<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class subcategorie
 * @package App\Models
 * @version May 6, 2021, 2:25 pm UTC
 *
 * @property string $name
 * @property integer $category_id
 */
class subcategorie extends Model
{
    use SoftDeletes;


    public $table = 'subcategories';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'category_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'category_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function categories()
    {
        return $this->belongsTo(categories::class, 'category_id');
    }
}
