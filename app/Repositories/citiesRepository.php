<?php

namespace App\Repositories;

use App\Models\cities;
use App\Repositories\BaseRepository;

/**
 * Class citiesRepository
 * @package App\Repositories
 * @version May 4, 2021, 9:48 am UTC
*/

class citiesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'state_id',
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
        return cities::class;
    }
}
