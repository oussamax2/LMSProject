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
        return $this->BelongsTo(courses::class, 'course_id')->withTrashed();
    }

    public function registerations()
    {
        return $this->HasMany(registerations::class, 'session_id')->withTrashed();
    }

    public function User()
    {
    	return $this->BelongsToMany(User::class,'registerations')->withTrashed();
    }
    public function companies()
    {
        // return $this->hasOneThrough(sessions::class, courses::class, 'company_id', 'course_id',  'id', 'id' );
        return $this->courses->companies();
    }


    public function countries()
    {
        return $this->BelongsTo(countries::class, 'country_id')->withTrashed();
    }

    public function states()
    {
        return $this->BelongsTo(states::class, 'state')->withTrashed();
    }

    public function cities()
    {
        return $this->BelongsTo(cities::class, 'city')->withTrashed();
    }


    /** verif is my */
    public function my()
    {
        if(auth()->user()->hasRole('admin'))
        return true;
        if(auth()->user()->hasRole('company'))
        return ($this->courses->company_id == auth()->user()->companies->id);
    }

    // this is the recommended way for declaring event handlers
    public static function boot() {
        parent::boot();
        self::deleting(function($session) { // before delete() method call this
             $session->registerations()->each(function($registerations) {
                $registerations->delete(); // <-- delete registerations belonging to this session
             });
                     
        });
    }
}
