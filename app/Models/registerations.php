<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\companies;



/**
 * Class registerations
 * @package App\Models
 * @version May 4, 2021, 9:53 am UTC
 *
 * @property integer $session_id
 * @property integer $user_id
 * @property string $status
 */
class registerations extends Model
{
    use SoftDeletes;
    use LogsActivity;


    public $table = 'registerations';


    protected $dates = ['deleted_at'];

    protected static $logAttributes = ['status'];
    protected static $logOnlyDirty = true;

    public $fillable = [
        'session_id',
        'user_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'session_id' => 'integer',
        'user_id' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function sessions()
    {
        return $this->BelongsTo(sessions::class, 'session_id');
    }

    public function user()
    {
        return $this->BelongsTo(User::class, 'user_id');

    }

    public function companies()
    {
        return companies::find($this->sessions->courses->company_id);

    }
    public function messaging()
    {
        return $this->HasMany(messaging::class, 'registeration_id');
    }
/** list for user  */
 public function touser()
    {
        return $this->where('user_id',auth()->user()->id);
    }
/** verif is my */
 public function my()
    {
        if(auth()->user()->hasRole('admin'))
        return true;
        if(auth()->user()->hasRole('user'))
        return ($this->user_id == auth()->user()->id);
        if(auth()->user()->hasRole('company'))
        return ($this->sessions->courses->company_id == auth()->user()->companies->id);
    }


}
