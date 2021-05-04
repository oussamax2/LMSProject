<?php

namespace App\Repositories;

use App\Models\states;
use App\Repositories\BaseRepository;

/**
 * Class statesRepository
 * @package App\Repositories
 * @version May 4, 2021, 9:39 am UTC
*/

class statesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'country_id',
        'name',
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
        return states::class;
    }
}
