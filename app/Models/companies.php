<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


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
        'dribbleurl'
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
        'dribbleurl' => 'string'
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

    public function User()
    {
        return $this->HasMany(User::class);
    }
}
