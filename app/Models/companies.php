<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

/**
 * Class companies
 * @package App\Models
 * @version May 7, 2021, 2:00 pm UTC
 *
 * @property string $lastname
 * @property string $website
 * @property string $telephone
 * @property string $picture
 * @property string $shortDescription
 * @property string $description
 * @property string $fcburl
 * @property string $twitturl
 * @property string $linkdinurl
 * @property string $dribbleurl
 */
class companies extends Model
{
    use SoftDeletes;


    public $table = 'companies';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'lastname',
        'website',
        'telephone',
        'picture',
        'shortDescription',
        'description',
        'fcburl',
        'twitturl',
        'linkdinurl',
        'dribbleurl',
        'user_id',
        'generaltrm',
        'paymenttrm',
        'canceltrm',
        'cancelpd'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'lastname' => 'string',
        'website' => 'string',
        'telephone' => 'string',
        'picture' => 'string',
        'shortDescription' => 'string',
        'description' => 'string',
        'fcburl' => 'string',
        'twitturl' => 'string',
        'linkdinurl' => 'string',
        'dribbleurl' => 'string',
        'generaltrm' => 'string',
        'paymenttrm' => 'string',
        'canceltrm' => 'string',
        'cancelpd' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'lastname' => 'max:10',
        'website' => 'max:100',
        'telephone' => 'max:15',
        'shortDescription' => 'max:100',
        'description' => 'max:180',
        'generaltrm' => 'max:500',
        'paymenttrm' => 'max:500',
        'canceltrm' => 'max:500',
        'cancelpd' => 'integer|min:1|max:100',
    ];

    public function courses()
    {
        return $this->HasMany(courses::class, 'company_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sessions()
    {
        return $this->courses;
    }

    // this is the recommended way for declaring event handlers
    public static function boot() {
        parent::boot();
        self::deleting(function($company) { // before delete() method call this
             $company->courses()->each(function($course) {
                $course->delete(); // <-- delete courses belonging to this company
             });

        });
    }
}
