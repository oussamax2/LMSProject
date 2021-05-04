<?php

namespace App\Repositories;

use App\Models\registerations;
use App\Repositories\BaseRepository;

/**
 * Class registerationsRepository
 * @package App\Repositories
 * @version May 4, 2021, 9:53 am UTC
*/

class registerationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'session_id',
        'user_id',
        'status'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return registerations::class;
    }
}
