<?php

namespace App\Repositories;

use App\Models\countries;
use App\Repositories\BaseRepository;

/**
 * Class countriesRepository
 * @package App\Repositories
 * @version May 4, 2021, 9:19 am UTC
*/

class countriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return countries::class;
    }
}
