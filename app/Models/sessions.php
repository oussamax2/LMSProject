<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class sessions
 * @package App\Models
 * @version May 4, 2021, 11:18 am UTC
 *
 * @property string $start
 * @property string $end
 * @property integer $fee
 * @property string $language
 * @property integer $course_id
 * @property integer $country_id
 * @property integer $state
 * @property integer $city
 * @property string $note
 */
class sessions extends Model
{
    use SoftDeletes;


    public $table = 'sessions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'start',
        'end',
        'fee',
        'language',
        'course_id',
        'country_id',
        'state',
        'city',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'start' => 'datetime',
        'end' => 'datetime',
        'fee' => 'integer',
        'language' => 'string',
        'course_id' => 'integer',
        'country_id' => 'integer',
        'state' => 'integer',
        'city' => 'integer',
        'note' => 'string'
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
        return $this->BelongsTo(courses::class, 'course_id');
    }

    public function registerations()
    {
        return $this->HasMany(registerations::class);
    }

    public function User()
    {
    	return $this->BelongsToMany(User::class,'registerations');
    }
    public function companies()
    {
        // return $this->hasOneThrough(sessions::class, courses::class, 'company_id', 'course_id',  'id', 'id' );
        return $this->courses->companies();
    }


    public function countries()
    {
        return $this->BelongsTo(countries::class, 'country_id');
    }

    public function states()
    {
        return $this->BelongsTo(states::class, 'state');
    } 
      
    public function cities()
    {
        return $this->BelongsTo(cities::class, 'city');
    }  
}
