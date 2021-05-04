<?php

namespace App\Repositories;

use App\Models\companies;
use App\Repositories\BaseRepository;

/**
 * Class companiesRepository
 * @package App\Repositories
 * @version May 4, 2021, 9:54 am UTC
*/

class companiesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return companies::class;
    }
}
