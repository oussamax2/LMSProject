<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\sessions;

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
        'name' => 'required|max:30',
        'category_id' => 'exists:categories,id',
    ];

    public function categories()
    {
        return $this->belongsTo(categories::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->HasMany(courses::class, 'subcateg_id');
    }

    public function countsessions()
    {
        return  sessions::where('publish',1)->whereHas('courses', function ($query) {
            $query->where('subcateg_id',$this->id);})->count();

    }
}
