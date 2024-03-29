<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;


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
    use LogsActivity;

    public $table = 'sessions';


    protected $dates = ['deleted_at'];

    protected static $logAttributes = [
        'start',
        'sess_type',
        'end',
        'fee',
        'language',
        'course_id',
        'country_id',
        'state',
        'city',
        'note',
        'status',
        'publish',
    ];
    protected static $logOnlyDirty = true;

    public $fillable = [
        'start',
        'sess_type',
        'end',
        'fee',
        'language',
        'course_id',
        'country_id',
        'state',
        'city',
        'note',
        'status',
        'publish',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sess_type' => 'string',
        'start' => 'datetime',
        'end' => 'datetime',
        'fee' => 'integer',
        'language' => 'integer',
        'course_id' => 'integer',
        'country_id' => 'integer',
        'state' => 'integer',
        'city' => 'integer',
        'note' => 'string',
        'slug' => 'string',
        'status' => 'integer',
        'publish' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'start' => 'required|after:yesterday',
        'end' => 'required|after:start',
        'fee' => 'required',
        'note' => 'max:180',
        'language' => 'exists:languages,id',
        'country_id' => 'exists:countries,id',
        'state' => 'exists:states,id',
        'course_id' => 'exists:courses,id',
        'city' => 'exists:cities,id',
    ];

    public function languages()
    {
        return $this->belongsTo(language::class, 'language');
    }

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
   /* public static function boot() {
        parent::boot();
        self::deleting(function($session) { // before delete() method call this
             $session->registerations()->each(function($registerations) {
                $registerations->delete(); // <-- delete registerations belonging to this session
             });

        });
    }*/
}
