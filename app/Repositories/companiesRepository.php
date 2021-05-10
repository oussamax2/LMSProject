<?php

namespace App\Repositories;

use App\Models\companies;
use App\Repositories\BaseRepository;

/**
 * Class companiesRepository
 * @package App\Repositories
 * @version May 7, 2021, 2:00 pm UTC
*/

class companiesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
