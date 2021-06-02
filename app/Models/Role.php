<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Role
 * @package App\Models
 * @version May 6, 2021, 3:10 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @property string $name
 * @property string $description
 */
class Role extends Model
{


    public $table = 'roles';
    



    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:10',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class, 'user_roles', 'user_id', 'role_id');
    }
}
